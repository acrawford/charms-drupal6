<?php
/**
 *  @file
 *  included at the start of each settings.php
 *  and can be overidden later in the settings.php
 *  but before the preboot.inc.php file is called, dont edit here
 *  modify the settings.php file with new values instead
 */
$obstart = function() {
        if (extension_loaded('gzip')) {
          if(!ob_start('ob_gzhandler')) {
            ob_start();
          }
        } else {
        ob_start();
        }
};

global $conf, $db_url, $drupal_db, $cookie_domain, $update_free_access, $db_prefix;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

//include_once(DRUPAL_ROOT.'/sites/all/libraries/Pixeldrop/ClassLoader/Loader.php');

$update_free_access = false;
$cookie_domain = $_SERVER['HTTP_HOST'];
//$conf['theme_default'] = 'cleanbox';
//$conf['maintenance_theme'] = 'cleanbox';
$conf['pressflow_smart_start'] = true;

ini_set('zend.enable_gc', 0);
ini_set('display_errors',0);
ini_set('timezone.default',     'America/Chicago');
ini_set('date.timezone',     'America/Chicago');
ini_set('realpath_cache_size',            '64m');
ini_set('realpath_cache_ttl',            '1800');
ini_set('arg_separator.output',     '&amp;');
ini_set('magic_quotes_runtime',     0);
ini_set('magic_quotes_sybase',      0);
ini_set('session.cache_expire',     200000);
ini_set('session.cache_limiter',    'none');
ini_set('session.cookie_lifetime',  2000000);
ini_set('session.gc_maxlifetime',   200000);
ini_set('session.save_handler',     'user');
ini_set('session.use_cookies',      1);
ini_set('session.use_only_cookies', 1);
ini_set('session.use_trans_sid',    0);
ini_set('url_rewriter.tags',        '');


//$conf['cache_inc'] = 'sites/all/modules/contrib/memcache/memcache.inc';
//$conf['cache_inc'] = 'sites/all/modules/contrib/cache_backport/cache.inc';
/*
$conf['cache_backends'] = array('sites/all/modules/contrib/apc_d7/drupal_apc_cache.inc');
$conf['cache_default_class'] = 'DrupalAPCCache';
//$conf['apc_show_debug'] = TRUE;
$conf['page_cache_without_database'] = TRUE;
$conf['page_cache_invoke_hooks'] = FALSE;
*/

$drupal_db = array (
 'type' => 'mysqli',
  'server' => '',
  'name' => '',
  'user' => '',
  'pass' => '',
  'prefix' => '',
);

$db_url = $drupal_db['type'].'://'.$drupal_db['user'].':'.$drupal_db['pass'].'@'.$drupal_db['server'].'/'.$drupal_db['name'];
$db_prefix = $drupal_db['prefix'];
