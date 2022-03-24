<?php

use mvc\core\meta\Controller;

class ErrorController extends Controller
{
    public function notFound(): string
    {
        return $this->render('_404');
    }
}
