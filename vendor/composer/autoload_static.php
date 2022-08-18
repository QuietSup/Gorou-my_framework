<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit008d00934bb3511ecf8405c3c4b9bbac
{
    public static $prefixLengthsPsr4 = array (
        'g' => 
        array (
            'gr\\' => 3,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'V' => 
        array (
            'Valitron\\' => 9,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'gr\\' => 
        array (
            0 => __DIR__ . '/..' . '/gr',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Valitron\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/valitron/src/Valitron',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit008d00934bb3511ecf8405c3c4b9bbac::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit008d00934bb3511ecf8405c3c4b9bbac::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit008d00934bb3511ecf8405c3c4b9bbac::$classMap;

        }, null, ClassLoader::class);
    }
}