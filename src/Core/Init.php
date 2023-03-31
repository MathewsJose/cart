<?php
namespace App\Core;

class Init {

    public static function view($template_name, $data = array())
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(dirname(__FILE__)) . '/Views');
        $twig = new \Twig\Environment($loader);
        $template = $twig->loadTemplate($template_name . '.html');
        echo $template->render($data);
    }
}
