<?php

namespace gr\core;

class App
{
    public static $app;

    public function __construct(){
        self::$app = Registry::instance();
    }
}