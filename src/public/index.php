<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


define('ROOT_DIR', dirname(__DIR__));
require_once ROOT_DIR . '/vendor/autoload.php';

use mvc\core\Application;
Application::run();
