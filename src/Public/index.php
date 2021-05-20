<?php
define('ROOT', dirname(__DIR__));
define('SITE', (isset($_SERVER['HTTPS']) ? "https://": "http://") . $_SERVER['SERVER_NAME']);

session_start();

require_once ROOT . '/Core/Router.php';
Router::getInstance()->route();
