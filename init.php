<?php
session_start();
date_default_timezone_set('Europe/Amsterdam');

//require_once __DIR__ . "/classes/FE_Betaalpagina.php";
//require_once __DIR__ . "/classes/FE_Blog.php";
//require_once __DIR__ . "/classes/FE_Contact.php";
//require_once __DIR__ . "/classes/FE_Package.php";

spl_autoload_register(function($class) {
    require_once __DIR__ . "/cms/classes/{$class}.php";
});

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);