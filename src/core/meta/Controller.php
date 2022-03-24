<?php

namespace mvc\core\meta;

abstract class Controller
{
    public function render($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function layoutContent()
    {
        ob_start();
        include_once ROOT_DIR . "/app/views/layouts/base.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $data)
    {
        ob_start();
        include_once ROOT_DIR . "/app/views/pages/$view.php";
        return ob_get_clean();
    }
}