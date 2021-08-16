<?php

use mvc\core\abc\Controller;

class SiteController extends Controller
{
    public function index(): string
    {
        return $this->render('index');
    }

    public function about(): string
    {
        return $this->render('about');
    }
}
