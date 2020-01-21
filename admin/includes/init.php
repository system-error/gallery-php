<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT',DS.'xampp7312'.DS.'htdocs'.DS.'gallery');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');
defined('IMAGES_PATH') ? null : define('IMAGES_PATH', SITE_ROOT.DS.'admin'.DS.'images');

require_once(INCLUDES_PATH.'/functions.php');
require_once(INCLUDES_PATH.'/new_config.php');
require_once(INCLUDES_PATH.'/classes/database.php');
require_once(INCLUDES_PATH.'/classes/session.php');
require_once(INCLUDES_PATH.'/classes/dbClass.php');
require_once(INCLUDES_PATH.'/classes/photo.php');
require_once(INCLUDES_PATH.'/classes/comment.php');



