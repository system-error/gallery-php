<?php
// Database Connection Constants

define('DB_HOST','localhost');
define('DB_USER','root');
define('BD_PASS','');
define('DB_NAME','gallery');

$connection = mysqli_connect(DB_HOST,DB_USER,BD_PASS,DB_NAME);

if ($connection){
    echo "connected";
}