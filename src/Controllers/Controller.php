<?php


abstract class Controller
{
    public string $default_action  = '404';

    protected function render(string $file, array $data = [])
    {
        $ext = empty($data) ? 'html' : 'php';

        ob_start();
        require_once ROOT . '/views/' . basename(get_class($this), 'Controller') . '/' . $file . '.' . $ext;
        $content = ob_get_clean();

        require_once ROOT . '/views/template.phtml';
    }
}