<?php

$GLOBALS['contr'] = "controllers/";
$GLOBALS['lib'] = "libs/";
$GLOBALS['rep'] = "repository/";
$GLOBALS['view'] = "views/";
$GLOBALS['mod'] = "models/";

$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
define('ROOTURL', $rootUrl);


?>