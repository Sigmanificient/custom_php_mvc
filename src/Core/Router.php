<?php

require_once ROOT . "/Core/Singleton.php";


class Router extends Singleton
{
    private const _index = 'Global/index';

    public function route()
    {
        $uri = $this::prettify();

        $params = explode('/', $uri);
        $controller = ucfirst(array_shift($params)) . 'Controller';

        if (!file_exists(ROOT . '/Controllers/' . $controller . '.php')) {
            self::set_404();
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

        if ($uri[-1] !== '/')
            return $uri;

        $new_uri = substr($uri, 0, -1);
        $this->redirect($new_uri);
        return $new_uri;

    }

    public static function redirect($url, $code = 301)
    {
        http_response_code($code);
        header('Location: ' . $url);
    }

    public static function set_404()
    {
        self::redirect("/Error/not_found", 404);
    }
}
