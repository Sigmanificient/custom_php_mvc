<?php

namespace mvc\core;
use mvc\core\http\Request;
use mvc\core\http\Response;

class Router
{
    public function getParams(): array
    {
        $uri = Request::getUri();
        return explode('/', $uri == '/' ? "Site/index" : substr($uri, 1));
    }

    public function resolve()
    {
        $params = $this->getParams();

        $controllerName = ucfirst(array_shift($params)) . 'Controller';

        if (!file_exists(ROOT_DIR . "/app/controllers/$controllerName.php")) {
            Response::redirect('/');
        }

        require_once ROOT_DIR . '/app/controllers/' . $controllerName . '.php';
        $controller = new $controllerName();

        $methodName = strtolower(array_shift($params));
        if (!method_exists($controller, $methodName)) {
            Response::redirect('/');
        }

        return call_user_func_array([$controller, $methodName], $params);
    }
}