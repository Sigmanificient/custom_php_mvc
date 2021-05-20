<?php

require_once ROOT . "/Controllers/Controller.php";


class GlobalController extends Controller
{

    public function index()
    {
        $this->render('index');
    }

    public function about()
    {
        $this->render('about');
    }
}
