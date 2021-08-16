<?php

namespace mvc\core;

class Router
{

    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($uri, $callback)
    {
        $this->routes['get'][$uri] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            echo '404 Not Found';
            return;
        }

        echo call_user_func($callback);
    }
}