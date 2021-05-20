<?php

require_once ROOT . "/Core/Singleton.php";

class Router extends Singleton
{
    public function route()
    {
        $this::prettify();
    }

    public function prettify()
    {
        $uri = $_SERVER['REQUEST_URI'];

        if ($uri === '/')
            return;

        if ($uri[-1] !== '/')
            return;

        $new_uri = substr($uri, 0, -1);

        http_response_code(301);
        header('Location: ' . $new_uri);
    }
}
