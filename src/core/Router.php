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

    public function get($uri, $callback)
    {
        $this->routes['get'][$uri] = $callback;
    }

    public function post($uri, $callback)
    {
        $this->routes['post'][$uri] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
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
