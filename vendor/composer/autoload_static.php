<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb82641af4e49aa26defff412652b4a55
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '667aeda72477189d0494fecd327c3641' => __DIR__ . '/..' . '/symfony/var-dumper/Resources/functions/dump.php',
        '10463a2818cfd6b68dd4d9afc0e67845' => __DIR__ . '/..' . '/snowair/phalcon-debugbar/src/Debug.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Whoops\\' => 7,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\VarDumper\\' => 28,
            'Snowair\\Debugbar\\' => 17,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'D' => 
        array (
            'DebugBar\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Whoops\\' => 
        array (
            0 => __DIR__ . '/..' . '/filp/whoops/src/Whoops',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\VarDumper\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/var-dumper',
        ),
        'Snowair\\Debugbar\\' => 
        array (
            0 => __DIR__ . '/..' . '/snowair/phalcon-debugbar/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'DebugBar\\' => 
        array (
            0 => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb82641af4e49aa26defff412652b4a55::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb82641af4e49aa26defff412652b4a55::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
