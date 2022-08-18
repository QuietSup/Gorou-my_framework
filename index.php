<?php
namespace app;

//require  '../app/core/Router.php';

use gr\core\App;
use gr\core\Router;


define('CACHE', dirname(__DIR__).'new/app/tmp/cache');
require __DIR__.'/vendor/autoload.php';

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)){
        require $path;
    }
});

session_start();

$router = new Router();
//echo '5';

new App;

$router->run();
