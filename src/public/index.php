<?php

define('ROOT_DIR', dirname(__DIR__));
require_once dirname(ROOT_DIR) .'/vendor/autoload.php';

use mvc\core\Application;

$app = new Application();

$app->router->get('/', 'site', 'index');
$app->run();
