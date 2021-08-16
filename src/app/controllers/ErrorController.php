<?php

use mvc\core\abc\Controller;

class ErrorController extends Controller
{
    public function notFound(): string
    {
        return $this->render('_404');
    }
}
