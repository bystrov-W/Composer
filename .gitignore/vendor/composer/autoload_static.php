<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf3c3161b45c56be6ffd99dc6298020b5
{
    public static $prefixesPsr0 = array (
        'Y' => 
        array (
            'Yandex\\Geo' => 
            array (
                0 => __DIR__ . '/..' . '/yandex/geo/source',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitf3c3161b45c56be6ffd99dc6298020b5::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
