<?php

namespace gr\core;
//require 'vendor/gr/lib/dev.php';

class Router{

    protected array $routes = [];
    protected array $params = [];
    protected array $gets = [
        'set/find',
        'set/all_terms',
        'set/flashcards',
        'user/account',
        'set/edit'
    ];

    function __construct()
    {
        $arr = require 'app/config/routes.php';
//        debug($arr);
        foreach ($arr as $key => $val){
            $this->add($key, $val);
        }
    }

    public function add($route, $params): void
    {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match(): bool
    {
        $url = trim(parse_url($_SERVER['REQUEST_URI'])["path"], '/');
//        debug($url);
        foreach ($this->routes as $route => $params){
            if (preg_match($route, $url)){
                $this->params = $params;
                return true;
            }
        }
        foreach ($this->gets as $get) {
            if (str_starts_with($url, $get)) {
//                $url_components = parse_url($url);
//                parse_str($url_components['query'], $data);
                foreach ($this->routes as $route => $params){
                    if (preg_match($route, $get)){
                        $this->params = $params;
                        return true;
                    }
                }
                return true;
            }
        }
        return false;
    }

    public function run(): void
    {
        if($this->match()){
           $path = 'app\\controllers\\'.ucfirst($this->params['controller']).'Controller';
           if (class_exists($path)){
               $action = $this->params['action'].'Action';
               if (method_exists($path, $action)){
                   $controller = new $path($this->params);
                   $controller->$action();
               }
               else {
                   View::errorCode(404);
               }
           }
           else {
               View::errorCode(404);
           }
        }
        else {
            View::errorCode(404);
        }

    }

}