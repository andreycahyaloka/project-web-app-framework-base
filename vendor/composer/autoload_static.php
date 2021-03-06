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
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
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
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'PHPMailer\\PHPMailer\\Exception' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/Exception.php',
        'PHPMailer\\PHPMailer\\OAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/OAuth.php',
        'PHPMailer\\PHPMailer\\PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/PHPMailer.php',
        'PHPMailer\\PHPMailer\\POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/POP3.php',
        'PHPMailer\\PHPMailer\\SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/SMTP.php',
        'app\\auth\\Auth' => __DIR__ . '/../..' . '/app/auth/Auth.php',
        'app\\auth\\AuthController' => __DIR__ . '/../..' . '/app/auth/AuthController.php',
        'app\\auth\\MailerController' => __DIR__ . '/../..' . '/app/auth/MailerController.php',
        'app\\auth\\PasswordController' => __DIR__ . '/../..' . '/app/auth/PasswordController.php',
        'app\\auth\\Token' => __DIR__ . '/../..' . '/app/auth/Token.php',
        'app\\controllers\\AdminController\\Users' => __DIR__ . '/../..' . '/app/controllers/AdminController/Users.php',
        'app\\controllers\\GuestController\\Agecalcs' => __DIR__ . '/../..' . '/app/controllers/GuestController/Agecalcs.php',
        'app\\controllers\\GuestController\\Matdescols' => __DIR__ . '/../..' . '/app/controllers/GuestController/Matdescols.php',
        'app\\controllers\\GuestController\\Pwgens' => __DIR__ . '/../..' . '/app/controllers/GuestController/Pwgens.php',
        'app\\controllers\\GuestController\\Strrevs' => __DIR__ . '/../..' . '/app/controllers/GuestController/Strrevs.php',
        'app\\controllers\\Guests' => __DIR__ . '/../..' . '/app/controllers/Guests.php',
        'app\\controllers\\Posts' => __DIR__ . '/../..' . '/app/controllers/Posts.php',
        'app\\controllers\\UserController\\Accounts' => __DIR__ . '/../..' . '/app/controllers/UserController/Accounts.php',
        'app\\controllers\\UserController\\Items' => __DIR__ . '/../..' . '/app/controllers/UserController/Items.php',
        'app\\controllers\\Users' => __DIR__ . '/../..' . '/app/controllers/Users.php',
        'app\\messages\\Flash' => __DIR__ . '/../..' . '/app/messages/Flash.php',
        'app\\models\\Post' => __DIR__ . '/../..' . '/app/models/Post.php',
        'app\\models\\RememberLogin' => __DIR__ . '/../..' . '/app/models/RememberLogin.php',
        'app\\models\\User' => __DIR__ . '/../..' . '/app/models/User.php',
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
