<?php

namespace gr\core;

use JetBrains\PhpStorm\NoReturn;

class View
{
    public string $path;
    public $route;
    public string $layout = 'default';
    public array $vars = [];


    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = []): void
    {
        extract($vars);
        $path = 'app/view/'.$this->path.'.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'app/view/'.$this->layout.'.php';
        }
        else {
            echo 'view not found';
        }
    }

    #[NoReturn] public static function errorCode($code): void
    {
        http_response_code($code);
        $path = 'app/view/errors/'.$code.'.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    #[NoReturn] public function message($status, $message): void
    {
        exit(json_encode(['status' => $status, 'message' => $message,]));
    }

    #[NoReturn] public function location($url): void
    {
        exit(json_encode(['url' => $url]));
    }

    public function set($vars): void
    {
        $this->vars = $vars;
    }

}