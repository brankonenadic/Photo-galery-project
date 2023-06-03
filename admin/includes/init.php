<?php 


defined('DS') ? NULL : define('DS' , DIRECTORY_SEPARATOR);
define('SITE_ROOT', DS . 'laragon' . DS . 'www' . DS . 'main-folder' . DS . 'PHP folders' . DS . 'Photo gallery project');
defined('INCLUDES_PATH') ? NULL : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');
//"C:\laragon\www\main-folder\PHP folders\Photo gallery project"


defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_ROOT.DS.'admin'.DS.'images');

require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."config.php");
require_once(INCLUDES_PATH.DS."database.php");
require_once(INCLUDES_PATH.DS."db_object.php");
require_once(INCLUDES_PATH.DS."user.php");
require_once(INCLUDES_PATH.DS."photo.php");
require_once(INCLUDES_PATH.DS."comment.php");
require_once(INCLUDES_PATH.DS."session.php");
require_once(INCLUDES_PATH.DS."paginate.php");


 ?>