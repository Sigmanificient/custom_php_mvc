<?php

require_once ROOT . "/Controllers/Controller.php";


class UserController extends Controller
{
    public string $default_action = 'login';

    public function login()
    {
        $error = $_SESSION['error'] ?? false;
        unset($_SESSION['error']);

        $this->render('login', ['error' => $error]);
    }

}
