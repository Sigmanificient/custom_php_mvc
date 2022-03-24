<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


define('ROOT_DIR', dirname(__DIR__));
require_once ROOT_DIR . '/vendor/autoload.php';

use mvc\core\Application;

$app = new Application();

$app->router->get('/', 'site', 'index');
$app->router->get('/about', 'site', 'about');
$app->router->get('/login', 'auth', 'login');
$app->router->get('404', 'error', 'notFound');

$app->run();
