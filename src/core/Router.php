<?php

namespace mvc\core;

use mvc\core\http\Request;
use mvc\core\http\Response;

class Router
{

    public Request $request;
    public Response $response;

    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($uri, $controller, $method)
    {
        $this->routes['get'][$uri] = [$controller, $method];
    }

    public function post($uri, $controller, $method)
    {
        $this->routes['post'][$uri] = [$controller, $method];
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            $callback = $this->routes['get']['404'] ?? '404 Not Found';
        }

        if (is_string($callback)) {
            return $callback;
        }

        $controllerName = ucfirst(array_shift($callback)) . 'Controller';
        include ROOT_DIR . "/app/controllers/$controllerName.php";
        $controller = new $controllerName;

        $method = array_shift($callback);

        return $controller->$method();
    }
}
