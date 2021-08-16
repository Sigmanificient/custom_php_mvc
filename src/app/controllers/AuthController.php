<?php

use mvc\core\Session;
use mvc\core\abc\Controller;

class AuthController extends Controller
{
    public function login(): string
    {
        return $this->render(
            'user/login',
            ['error' => Session::getInstance()->flash]
        );
    }
}
