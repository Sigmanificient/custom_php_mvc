<?php
define('ROOT', dirname(__DIR__));
define('SITE', ($_SERVER['SERVER_PORT'] == 443) ? "https://": "http://" . $_SERVER['SERVER_NAME']);

var_dump(ROOT);
var_dump(SITE);

require_once ROOT . '/Core/Router.php';

$router = new Router();
$router->get_route();
