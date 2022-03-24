<?php

namespace mvc\core;

use mvc\core\http\Response;

class Application
{
    public static function run()
    {
        $router = new Router();
        $response_content = $router->resolve();

        if ($response_content) {
            echo $response_content;
            Response::status(200);
        }
    }
}
