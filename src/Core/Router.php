<?php

require_once ROOT . "/Core/Singleton.php";


class Router extends Singleton
{
    private const _global = 'Global';
    private const _index = self::_global . '/index';

    public function route()
    {
        $uri = $this::prettify();

        $params = explode('/', $uri);
        $controller = ucfirst(array_shift($params)) . 'Controller';

        if (!file_exists(ROOT . '/Controllers/' . $controller . '.php')) {

            $action = substr($controller, 0, -10);
            $controller = $this::_global . 'Controller';

            require_once ROOT . '/Controllers/' . $controller . '.php';

            $controller = new $controller();

            if (method_exists($controller, $action) && empty($params)) {
                $controller->$action();
                return;
            }

            $this->set_404();
            return;
        }

        require_once ROOT . '/Controllers/' . $controller . '.php';
        $controller = new $controller();

        $action = (isset($params[0])) ? array_shift($params) : $controller->default_action;
        $action = method_exists($controller, $action) ? $action : $controller->default_action;

        if ($action === '404') {
            self::set_404();
            return;
        }

        empty($params) ? $controller->$action() : $controller->$action($params);
    }

    public function prettify(): string
    {
        $uri = $_SERVER['REQUEST_URI'];

        if ($uri === '/')
            return $this::_index;

        $uri = substr($uri, 1);

        if ($uri === $this::_index) {
            $this->redirect(SITE);
            return $uri;
        }

        if (substr($uri, 0, strlen($this::_global)) === $this::_global) {
            $this->redirect(SITE . substr($uri, strlen($this::_global)));
        }

        if ($uri[-1] !== '/')
            return $uri;

        $new_uri = substr($uri, 0, -1);
        $this->redirect(SITE . '/' . $new_uri);
        return $new_uri;

    }

    public static function redirect($url, $code = 301)
    {
        http_response_code($code);
        header('Location: ' . $url);
    }

    public static function set_404()
    {
        $controller = 'ErrorController';

        require_once ROOT . '/Controllers/' . $controller . '.php';
        $controller = new $controller();

        $controller->not_found();
    }
}
