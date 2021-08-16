<?php

namespace mvc\core;

use mvc\core\abc\Singleton;

class Session extends Singleton
{

    public ?string $flash = null;

    public function __construct()
    {
        session_start();

        if (isset($_SESSION['flash'])) {
            $this->flash = $_SESSION['flash'];
            $this->pop('flash');
        }
    }

    public function add($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? [];
    }

    public function pop($key)
    {
        unset($_SESSION[$key]);
    }
}
