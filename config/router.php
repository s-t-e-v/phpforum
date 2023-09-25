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

// Retrieve the current URI from the server
$currentUrl = $_SERVER['REQUEST_URI'];
$parsed_url = parse_url($currentUrl);

// Extract the path segments from the parsed URL
$path_segments = explode('/', $parsed_url['path']);

// Handle forum URLs
if ($path_segments[1] == 'f') {
    // Set forum session and extract requested route
    $_SESSION['forum'] = $path_segments[2];
    $requestedRoute = implode('/', array_slice($path_segments, 3));
} else {
    // Extract requested route (non-forum)
    $requestedRoute = implode('/', array_slice($path_segments, 1));
    if ($requestedRoute === '')
        unset($_SESSION['forum']);
}

/** 
 * If the forum url name extracted exist among the registered ones, error 404.
 */
if (isset($_SESSION['forum']) && !Forum::findByURLName(['url_name' => $_SESSION['forum']])) {
    // Unset the forum session, require 404 page, and terminate script
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
    // Require 404 page and terminate script
    require_once PUBLIC_FOLDER  . '404.php';
    die;
}

/**
 * Invoke the method corresponding to the requested route
 * 
 * If the route is found, we call the class' method correponding the requested route
 * Example: '' => ['AppController', 'index'] => we call AppController::index()
 */
$foundMethod = $routes[$requestedRoute];
$class = $foundMethod[0];
$method = $foundMethod[1];

// We call the methode :
$class::$method();
