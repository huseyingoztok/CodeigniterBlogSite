<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd6b0331e72a94f522927079617dcb437
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/league/color-extractor/src',
    );

    public static $prefixesPsr0 = array (
        'c' => 
        array (
            'claviska' => 
            array (
                0 => __DIR__ . '/..' . '/claviska/simpleimage/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInitd6b0331e72a94f522927079617dcb437::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd6b0331e72a94f522927079617dcb437::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}