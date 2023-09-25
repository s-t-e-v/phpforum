<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:13:11 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-21 00:27:47
 * @Description: Router management 
 */


/**
 * ROUTER MANAGEMENT
 */


$currentUrl = $_SERVER['REQUEST_URI'];                  // We retrieve the current URI

$parsed_url = parse_url($currentUrl);

$path_segments = explode('/', $parsed_url['path']);

if ($path_segments[1] == 'f') {
    $_SESSION['forum'] = $path_segments[2]; // This will be 'exodia' in your example
    $requestedRoute = implode('/', array_slice($path_segments, 3)); // This will be 'topic/chat?id=16' in your example
} else {
    $requestedRoute = implode('/', array_slice($path_segments, 1)); // This will be 'topic/chat?id=16' in your example
    if ($requestedRoute === '')
        unset($_SESSION['forum']);
}

/** 
 * If the forum url name extracted exist among the registered ones, error 404.
 */
if (isset($_SESSION['forum']) && !Forum::findByURLName(['url_name' => $_SESSION['forum']])) {
    unset($_SESSION['forum']);
    require_once PUBLIC_FOLDER  . '404.php';
    die;
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
