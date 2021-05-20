<?php

require_once ROOT . "/Core/Singleton.php";


class Router extends Singleton
{
    private const _index = '/Global/index';

    public function route()
    {
        $uri = $this::prettify();

        echo $uri;

    }

    public function prettify(): string
    {
        $uri = $_SERVER['REQUEST_URI'];

        if ($uri === '/')
            return $this::_index;

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

    public static function redirect($url, $code=301)
    {
        http_response_code($code);
        header('Location: ' . $url);
    }

    public static function set_404()
    {
        self::redirect("/Error/404", 404);
    }
}
