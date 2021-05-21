<?php


abstract class Controller
{
    public string $default_action = '404';

    protected function render(string $file, array $data = [])
    {
        $ext = empty($data) ? 'html' : 'php';

        $time_start = microtime(true);

        ob_start();
        require_once ROOT . '/views/' . basename(get_class($this), 'Controller') . '/' . $file . '.' . $ext;
        $content = ob_get_clean();

        ob_start();
        require_once ROOT . '/views/template.phtml';
        echo sanitize_output(ob_get_clean());
    }
}

function sanitize_output($buffer)
{
    // function by Rakesh Sankar

    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );

    $replace = array('>', '<', '\\1', '');
    return preg_replace($search, $replace, $buffer);
}