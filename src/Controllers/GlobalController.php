<?php

require_once ROOT . "/Controllers/Controller.php";


class GlobalController extends Controller
{

    public function index()
    {
        echo "welcome";
    }

    public function foo()
    {
        echo "foo";
    }
}
