<?php

/**
 * AUTOCHARGEMENT DES CLASSES
 */
spl_autoload_register(function($class) {

    foreach(['config/', 'src/controllers/', 'src/models/'] as $folder) {
        $file = '../' . $folder . $class . '.php';
        if (file_exists( $file )) {
            require_once($file);
        }
    }
});

/**
 * GESTION DU ROUTEUR
 */
$currentUrl = $_SERVER['REQUEST_URI'];                  // On récupère l'URI actuelle

$requestedRoute = ''; // Par défaut, page  d'accueil
$urlExploded = explode('index.php', $currentUrl);
if (count($urlExploded) > 1) {
    $requestedRoute = $urlExploded[1]; // On récupère tout ce qu'il y a après index.php
    $requestedRoute = explode('?', $requestedRoute)[0]; // On retire les paramètres GET
}

/**
 * On teste si la route demandée $requestedRoute existe dans le tableau de routes
 */

$paths = array_keys($routes); // Liste des chemins déclarés

/**
 * Si la route (testée sans ses params GET) n'existe pas dans les routes déclarées, erreur 404.
 */
if (!in_array( $requestedRoute , $paths)) {
    require_once PUBLIC_FOLDER  . '404.php';
    die;
}

/**
 * Si une route est trouvée, on appelle la méthode de classe correspondant à la route demandée
 * Exemple: '' => ['AppController', 'index'] => on appelle AppController::index()
 */
$foundMethod = $routes[$requestedRoute];
$class = $foundMethod[0];
$method = $foundMethod[1];

// On appelle la méthode :
$class::$method();