<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'App\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/app/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

include_once __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/functions.php';
include_once __DIR__ . '/app/Core/RouterList.php';
include_once __DIR__ . '/routers.php';
include_once __DIR__ . '/app/Controllers/HomeController.php';
include_once __DIR__ . '/app/Controllers/LoginController.php';
include_once __DIR__ . '/app/Controllers/ProductsController.php';
include_once __DIR__ . '/app/Controllers/ImageController.php';
include_once __DIR__ . '/app/Controllers/DebugController.php';
include_once __DIR__ . '/app/Models/Model.php';
include_once __DIR__ . '/app/Models/ProductModel.php';