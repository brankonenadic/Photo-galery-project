<?php
defined('DS') ? NULL : define('DS' , DIRECTORY_SEPARATOR);
define('SITE_ROOT', DS . 'laragon' . DS . 'www' . DS . 'main-folder' . DS . 'PHP folders' . DS . 'Photo gallery project');
defined('INCLUDES_PATH') ? NULL : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');
//"C:\laragon\www\main-folder\PHP folders\Photo gallery project"
require_once("functions.php");
require_once("new_confing.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("session.php");
require_once("comment.php");



?>