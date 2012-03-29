<?php
global $escape_string, $db_url;
if(!defined('APP_LIB'))
{
  define('APP_LIB', DRUPAL_ROOT.'/sites/all/libraries/');
}

$public_files_dir = DRUPAL_ROOT . '/files';
$tmp_files_dir = DRUPAL_ROOT . '/files/tmp';
define('PUBLIC_FILES',$public_files_dir);
define('TMP_FILES',$tmp_files_dir);

if (!class_exists('StringEscape')) {

  class StringEscape {

    function __get($value) {
      $search = array("\\", "\0", "\n", "\r", "\x1a", "'", '"');
      $replace = array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"');
      return str_replace($search, $replace, $value);
    }

  }

}

// use this later with a global and then to escape DB input like below
//   global $escape_string;
//   $name = 'bob@!;'
//   $sql = "select * form mytable where name = " . $escape_string->$name;
//
// using the magic method of __get() you never have an excuse not to excape data
// does not rely on a db connectino like mysql_escape_string()
$escape_string = new StringEscape;

