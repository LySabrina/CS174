<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6ee582c797250538fe7e65cf3527ebaf
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'PhpConsole\\' => 11,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'PhpConsole\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-console/php-console/src/PhpConsole',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6ee582c797250538fe7e65cf3527ebaf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6ee582c797250538fe7e65cf3527ebaf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6ee582c797250538fe7e65cf3527ebaf::$classMap;

        }, null, ClassLoader::class);
    }
}
