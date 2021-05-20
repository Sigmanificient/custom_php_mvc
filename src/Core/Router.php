<?php

require_once ROOT . "/Core/Singleton.php";

class Router extends Singleton
{
    public function route()
    {
        $uri = $this::prettify();

        echo $uri;

    }

    public function prettify(): string
    {
        $uri = $_SERVER['REQUEST_URI'];

        if ($uri === '/' or $uri[-1] !== '/')
            return $uri;

        $new_uri = substr($uri, 0, -1);

        // http_response_code(301);
        // header('Location: ' . $new_uri);

        return $new_uri;
    }
}
