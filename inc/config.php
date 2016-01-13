<?php
//error_reporting(E_ERROR);
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

define("DIR_FS_SYSTEM","/var/www/html/address_book/");
define("DIR_WS_SYSTEM","http://localhost/address_book/");
define("DIR_FS_CONFIG",DIR_FS_SYSTEM);
define('DIR_FS_LIB',DIR_FS_SYSTEM.'lib/');
define('DIR_WS_LIB',DIR_WS_SYSTEM.'lib/');
define('DIR_FS_CLASSES',DIR_FS_SYSTEM.'classes/');

$debug = 0;

$db_host = "localhost";
$db_user = "root";
$db_password = "root";
$db_name = "address_book_db";
$db_management_system = "mysql";
?>