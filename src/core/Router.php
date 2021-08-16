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
            return '404 Not Found';
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

       return call_user_func($callback);
    }

    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function layoutContent() {
        ob_start();
        include_once ROOT_DIR."/app/views/layouts/base.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view) {
        ob_start();
        include_once ROOT_DIR."/app/views/pages/$view.php";
        return ob_get_clean();
    }
}
