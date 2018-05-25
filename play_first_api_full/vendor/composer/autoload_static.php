<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit27b9cbb7729f33fb88a161f391c97061
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Source/Models',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit27b9cbb7729f33fb88a161f391c97061::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit27b9cbb7729f33fb88a161f391c97061::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}