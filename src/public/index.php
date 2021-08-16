<?php

require_once dirname(__DIR__, 2) .'/vendor/autoload.php';

use mvc\core\Application;

$app = new Application();

$app->router->get(
    '/',
    function () {
        return 'index page';
    }
);

$app->run();