<?php

$GLOBALS['contr'] = "controllers/";
$GLOBALS['lib'] = "libs/";
$GLOBALS['mod'] = "models/";
$GLOBALS['view'] = "views/";

$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
define('ROOTURL', $rootUrl);


?>