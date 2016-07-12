<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit397dd243a0c88ad192b4ac00015847b7
{
    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static $classMap = array (
        'Home' => __DIR__ . '/../..' . '/kontroleri/Home.php',
        'Korisnici' => __DIR__ . '/../..' . '/kontroleri/Korisnici.php',
        'Registracija' => __DIR__ . '/../..' . '/kontroleri/Registracija.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit397dd243a0c88ad192b4ac00015847b7::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit397dd243a0c88ad192b4ac00015847b7::$classMap;

        }, null, ClassLoader::class);
    }
}