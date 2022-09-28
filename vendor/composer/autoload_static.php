<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit72372163b5b32b9b54105080f5e432da
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Coderok\\TinkoffAquaring\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Coderok\\TinkoffAquaring\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit72372163b5b32b9b54105080f5e432da::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit72372163b5b32b9b54105080f5e432da::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit72372163b5b32b9b54105080f5e432da::$classMap;

        }, null, ClassLoader::class);
    }
}
