<?php
namespace App\Core;

class Init {

	public static function view($template_name, $data = array())
	{
		$loader = new Twig_Loader_Filesystem('views');
        $twig   = new Twig_Environment($loader);
		$template = $twig->loadTemplate($template_name . '.html');
		echo $template->render($data);
	}
}
