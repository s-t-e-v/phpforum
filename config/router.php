<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:13:11 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-07 22:26:18
 * @Description: Classes autoloading and router management 
 */


/**
 * CLASSES AUTOLOADING
 */
spl_autoload_register(function ($class) {

    foreach (['src/controllers/', 'src/models/', 'src/lib/'] as $folder) {
        $file = '../' . $folder . $class . '.php';
        if (file_exists($file)) {
            require_once($file);
        }
    }
});

/**
 * ROUTER MANAGEMENT
 */
$currentUrl = $_SERVER['REQUEST_URI'];                  // We retrieve the current URI

$requestedRoute = ''; // By default, home page
$urlExploded = explode('index.php', $currentUrl);
if (count($urlExploded) > 1) {
    $requestedRoute = $urlExploded[1]; // We retrive everything after index.php
    $requestedRoute = explode('?', $requestedRoute)[0]; // We remove the GET parameters
}

/**
 * We test if the requested route $requestedRoute exist within the tables of routes
 */

$paths = array_keys($routes); // List of declared paths

/**
 * If the route (tested without its GET params) doesn't exist among the declared routes, error 404.
 */
if (!in_array($requestedRoute, $paths)) {
    require_once PUBLIC_FOLDER  . '404.php';
    die;
}

/**
 * If the route is found, we call the class' method correponding the requested route
 * Example: '' => ['AppController', 'index'] => we call AppController::index()
 */
$foundMethod = $routes[$requestedRoute];
$class = $foundMethod[0];
$method = $foundMethod[1];

// We call the methode :
$class::$method();
