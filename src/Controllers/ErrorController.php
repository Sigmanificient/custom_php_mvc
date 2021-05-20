<?php

require_once ROOT . "/Controllers/Controller.php";


class ErrorController extends Controller
{

    public function not_found()
    {
        echo "404";
    }
}
