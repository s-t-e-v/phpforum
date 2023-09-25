<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:13:11 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-21 00:27:47
 * @Description: Classes autoloading and router management 
 */


/**
 * ROUTER MANAGEMENT
 */


// $requestedRoute = ''; // By default, home page
// $urlExploded = explode(BASE, $currentUrl);
// // var_dump($requestedRoute);
// // echo "<br>";
// // var_dump($urlExploded);
// // echo "<br>";
// // echo count($urlExploded);
// $requestedRoute = $urlExploded[0]; // We retrive everything after phpforum/public
// $requestedRoute = explode('?', $requestedRoute)[0]; // We remove the GET parameters
// $urlParts = explode('/', $requestedRoute);
// $forumName = $urlParts[array_search('f', $urlParts) + 1];

$currentUrl = $_SERVER['REQUEST_URI'];                  // We retrieve the current URI


// var_dump($currentUrl);
// echo "<br>";

$parsed_url = parse_url($currentUrl);

// var_dump($parsed_url);
// echo "<br>";
// die;

$path_segments = explode('/', $parsed_url['path']);


// var_dump($path_segments);
// echo "<br>";
// die;

if ($path_segments[1] == 'f') {
    $forumName = $path_segments[2]; // This will be 'exodia' in your example
    $requestedRoute = implode('/', array_slice($path_segments, 3)); // This will be 'topic/chat?id=16' in your example
} else {
    $requestedRoute = implode('/', array_slice($path_segments, 1)); // This will be 'topic/chat?id=16' in your example
}

if (isset($forumName)) {
    var_dump($forumName);
    echo "<br>";
}
var_dump($requestedRoute);
echo "<br>";
// die;

// var_dump($urlParts);
// echo "<br>";
// var_dump($forumName);
// echo "<br>";
// die;
// echo "<br>";
// var_dump($requestedRoute);
// die;
// if (count($urlExploded) > 1) {
//     $requestedRoute = $urlExploded[1]; // We retrive everything after index.php
//     $requestedRoute = explode('?', $requestedRoute)[0]; // We remove the GET parameters
// }

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
