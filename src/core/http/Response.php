<?php

namespace mvc\core\http;

class Response
{
    public static function redirect(string $location)
    {
        header("Location: $location");
    }

    public static function status(int $code)
    {
        http_response_code($code);
    }
}
