<?php


use mvc\core\http\Session;
use mvc\core\meta\Controller;

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
