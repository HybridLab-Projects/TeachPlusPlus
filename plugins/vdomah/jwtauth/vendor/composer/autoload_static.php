<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4e32ba1d653d08145e4ef0f11a16bc62
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        'bd9634f2d41831496de0d3dfe4c94881' => __DIR__ . '/..' . '/symfony/polyfill-php56/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tymon\\JWTAuth\\' => 14,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Util\\' => 22,
            'Symfony\\Polyfill\\Php56\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Contracts\\Translation\\' => 30,
            'Symfony\\Component\\Translation\\' => 30,
        ),
        'N' => 
        array (
            'Namshi\\JOSE\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tymon\\JWTAuth\\' => 
        array (
            0 => __DIR__ . '/..' . '/tymon/jwt-auth/src',
        ),
        'Symfony\\Polyfill\\Util\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-util',
        ),
        'Symfony\\Polyfill\\Php56\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php56',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Contracts\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation-contracts',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Namshi\\JOSE\\' => 
        array (
            0 => __DIR__ . '/..' . '/namshi/jose/src/Namshi/JOSE',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/nesbot/carbon/src',
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'UpdateHelper\\' => 
            array (
                0 => __DIR__ . '/..' . '/kylekatarnls/update-helper/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4e32ba1d653d08145e4ef0f11a16bc62::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4e32ba1d653d08145e4ef0f11a16bc62::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInit4e32ba1d653d08145e4ef0f11a16bc62::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit4e32ba1d653d08145e4ef0f11a16bc62::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
