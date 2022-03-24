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

    public function resolve($override_params = [])
    {
        $params = empty($override_params) ? $this->getParams() : $override_params;
        $controllerName = ucfirst(array_shift($params)) . 'Controller';

        if (!file_exists(ROOT_DIR . "/app/controllers/$controllerName.php")) {
            $controllerName = 'SiteController';
        }

        require_once ROOT_DIR . '/app/controllers/' . $controllerName . '.php';
        $controller = new $controllerName();

        $methodName = strtolower(array_shift($params));
        if (!method_exists($controller, $methodName)) {
            Response::status(404);
            return $this->resolve(['Error', 'notFound']);
        }

        return $controller->$methodName($params);
    }
}