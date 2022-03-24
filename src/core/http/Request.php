<?php

namespace mvc\core\http;

class Request
{

    public static function getUri(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }


    public static function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
