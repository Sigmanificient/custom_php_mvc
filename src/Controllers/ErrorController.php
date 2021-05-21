<?php

require_once ROOT . "/Controllers/Controller.php";


class ErrorController extends Controller
{

    public function not_found()
    {
        $this->render('404');
    }

    public function forbidden()
    {
        $this->render('403');
    }
}
