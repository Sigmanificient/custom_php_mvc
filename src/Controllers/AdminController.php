<?php

require_once ROOT . "/Controllers/Controller.php";


class AdminController extends Controller
{
    public string $default_action = 'index';

    public function index()
    {
        echo "admin";
    }

    public function test()
    {
        echo "test";
    }
}
