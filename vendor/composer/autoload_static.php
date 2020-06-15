<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a18f99d21b4707775f71e2ff7533f69
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Config\\Database' => __DIR__ . '/../..' . '/app/Config/Database.php',
        'App\\Controllers\\Controller' => __DIR__ . '/../..' . '/app/Controllers/Controller.php',
        'App\\Controllers\\TasksController' => __DIR__ . '/../..' . '/app/Controllers/TasksController.php',
        'App\\Core\\Model' => __DIR__ . '/../..' . '/app/Core/Model.php',
        'App\\Dispatcher' => __DIR__ . '/../..' . '/app/Dispatcher.php',
        'App\\Models\\Repository\\TaskRepository' => __DIR__ . '/../..' . '/app/Models/Repository/TaskRepository.php',
        'App\\Models\\Resource\\ResourceModel' => __DIR__ . '/../..' . '/app/Models/Resource/ResourceModel.php',
        'App\\Models\\Resource\\ResourceModelInterface' => __DIR__ . '/../..' . '/app/Models/Resource/ResourceModelInterface.php',
        'App\\Models\\Resource\\TaskResourceModel' => __DIR__ . '/../..' . '/app/Models/Resource/TaskResourceModel.php',
        'App\\Models\\Task' => __DIR__ . '/../..' . '/app/Models/Task.php',
        'App\\Request' => __DIR__ . '/../..' . '/app/Request.php',
        'App\\Router' => __DIR__ . '/../..' . '/app/Router.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a18f99d21b4707775f71e2ff7533f69::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a18f99d21b4707775f71e2ff7533f69::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3a18f99d21b4707775f71e2ff7533f69::$classMap;

        }, null, ClassLoader::class);
    }
}