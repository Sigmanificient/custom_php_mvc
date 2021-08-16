<?php

namespace mvc\core\abc;

abstract class Controller
{
    public function render($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function layoutContent()
    {
        ob_start();
        include_once ROOT_DIR . "/app/views/layouts/base.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view)
    {
        ob_start();
        include_once ROOT_DIR . "/app/views/pages/$view.php";
        return ob_get_clean();
    }
}