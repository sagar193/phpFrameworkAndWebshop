<?php
require 'settings/globalSettings.php';
require 'settings/database.php';

spl_autoload_register(function ($class) {
    include 'libs/' . $class . '.php';
});

$app = new Bootstrap();

?>