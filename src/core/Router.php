<?php

namespace mvc\core;

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
            $callback = ['Error', 'notFound'];
        }

        $controllerName = ucfirst(array_shift($callback)) . 'Controller';
        include ROOT_DIR."/app/controllers/$controllerName.php";
        $controller = new $controllerName;

        $method = array_shift($callback);

        echo $controller->$method();
    }
}
