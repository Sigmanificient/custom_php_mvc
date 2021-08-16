<?php

use mvc\core\abc\Controller;

class siteController extends Controller
{
    public function index(): string
    {
        return $this->render('index');
    }
}
