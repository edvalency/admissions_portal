<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita85aebbb2442f5d48d2365ee05e69d03
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita85aebbb2442f5d48d2365ee05e69d03::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita85aebbb2442f5d48d2365ee05e69d03::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita85aebbb2442f5d48d2365ee05e69d03::$classMap;

        }, null, ClassLoader::class);
    }
}
