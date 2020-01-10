<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT',DS.'xampp7312'.DS.'htdocs'.DS.'gallery');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

require_once('functions.php');
require_once('new_config.php');
require_once('classes/database.php');
require_once('classes/session.php');
require_once('classes/dbClass.php');
//require_once('classes/user.php');
//require_once('classes/photo.php');
//include('user.php');
