<?php

namespace gr\core;

require 'vendor/gr/lib/dev.php';


abstract class Controller
{
    public $route;
    public $view;
    public $acl;

    public function __construct($route)
    {
        $this->route = $route;
        if(!$this->checkAcl()){
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name){
        $path = 'app\models\\'.$name.'.php';
        if (class_exists($path)){
            return new $path();
        }
    }

    public function checkAcl(): bool
    {
        $this->acl = require 'app/acl/'.$this->route['controller'].'.php';
        if ($this->isAcl('all')) {
            return true;
        }
        if (isset($_SESSION['user']['id']) and $this->isAcl('authorized')) {
            return true;
        }
        return false;
    }

    public function isAcl($key){
        return in_array($this->route['action'], $this->acl[$key]);
    }

    public function slug(&$slug)
    {
        $url = $_SERVER['REQUEST_URI'];
//        $slug = str_replace("/set/all_terms/", '', $url);
        $slug = $url;
        for ($i=0; $i<3; $i++)
        $slug = substr($slug, strpos($slug, '/')+1);

//        debug(explode('/', $slug));

        return explode('/', $slug)[0];
    }
}