<?php
define('ROOT', dirname(__DIR__));
define('SITE', ($_SERVER['SERVER_PORT'] == 443) ? "https://": "http://" . $_SERVER['SERVER_NAME']);

session_start();

require_once ROOT . '/Core/Router.php';
Router::getInstance()->route();
