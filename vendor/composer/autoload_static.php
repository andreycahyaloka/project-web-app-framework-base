<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1b0581fe84bd48bb8a57071328af034f
{
    public static $prefixLengthsPsr4 = array (
        'f' => 
        array (
            'framework\\' => 10,
        ),
        'c' => 
        array (
            'config\\' => 7,
            'classes\\' => 8,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'framework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/framework',
        ),
        'config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
        'classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'app\\controllers\\AdminController\\Users' => __DIR__ . '/../..' . '/app/controllers/AdminController/Users.php',
        'app\\controllers\\GuestController\\Agecalcs' => __DIR__ . '/../..' . '/app/controllers/GuestController/Agecalcs.php',
        'app\\controllers\\GuestController\\Pwgens' => __DIR__ . '/../..' . '/app/controllers/GuestController/Pwgens.php',
        'app\\controllers\\GuestController\\Strrevs' => __DIR__ . '/../..' . '/app/controllers/GuestController/Strrevs.php',
        'app\\controllers\\Guests' => __DIR__ . '/../..' . '/app/controllers/Guests.php',
        'app\\controllers\\Posts' => __DIR__ . '/../..' . '/app/controllers/Posts.php',
        'app\\models\\Post' => __DIR__ . '/../..' . '/app/models/Post.php',
        'classes\\agecalc\\Agecalc' => __DIR__ . '/../..' . '/classes/agecalc/Agecalc.class.php',
        'classes\\pwgen\\Pwgen' => __DIR__ . '/../..' . '/classes/pwgen/Pwgen.class.php',
        'classes\\strrev\\Strrev' => __DIR__ . '/../..' . '/classes/strrev/Strrev.class.php',
        'config\\Config' => __DIR__ . '/../..' . '/config/Config.php',
        'framework\\Controller' => __DIR__ . '/../..' . '/framework/Controller.php',
        'framework\\Error' => __DIR__ . '/../..' . '/framework/Error.php',
        'framework\\Model' => __DIR__ . '/../..' . '/framework/Model.php',
        'framework\\Router' => __DIR__ . '/../..' . '/framework/Router.php',
        'framework\\View' => __DIR__ . '/../..' . '/framework/View.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1b0581fe84bd48bb8a57071328af034f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1b0581fe84bd48bb8a57071328af034f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1b0581fe84bd48bb8a57071328af034f::$classMap;

        }, null, ClassLoader::class);
    }
}