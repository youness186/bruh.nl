<?php
    session_start();
    date_default_timezone_set('Europe/Amsterdam');

    spl_autoload_register(function($class) {
        require_once __DIR__ . "/cms/classes/{$class}.php";
    });

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);