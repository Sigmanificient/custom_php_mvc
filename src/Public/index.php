<?php
define('ROOT', dirname(__DIR__));

$proto = ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? false) === 'https';
$port = ($_SERVER['SERVER_PORT'] ?? false) === 443;
$https = ($_SERVER['HTTPS'] ?? false) === 'on';

define('SITE', (($proto or $port or $https) ? 'https': 'http') . '://' . $_SERVER['SERVER_NAME']);

session_start();

require_once ROOT . '/Core/Router.php';
Router::getInstance()->route();
