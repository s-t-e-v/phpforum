<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-01 17:34:57 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-14 15:19:51
 * @Description: App configuration
 */


/**
 * General App configuration
 */
const APP_NAME = 'phpforum';
const APP_PROJECT_BASE_URL = 'http://localhost/phpforum';

/**
 * Constants for quick access to important MVC folders
 */
// url constant (to be used in href=/src=)
const BASE = APP_PROJECT_BASE_URL . '/public/index.php/';
// directory constants (to be used in requires/includes)
const BASE_DIR = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
const PUBLIC_FOLDER = BASE_DIR . 'public/';
const VIEWS = BASE_DIR . 'views/';
const MODELS = BASE_DIR . 'src/models/';
const CONTROLLERS = BASE_DIR . 'src/controllers/';
const UPLOAD = APP_PROJECT_BASE_URL . '/public/upload/';
const ASSETS = APP_PROJECT_BASE_URL . '/public/assets/';

// init_set error log
ini_set('error_log', __DIR__ . '/../error_log/error.log');


require_once(__DIR__ . '/../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
try {
    $dotenv->load();
} catch (Exception $e) {
    $_SESSION['messages']['danger'][] = "An unexpected error occurred in the application.";
    throw $e;
}

// Define the constants
define('DB_HOST', $_ENV['DATABASE_HOST']);
define('DB_PORT', $_ENV['DATABASE_PORT']);
define('DB_NAME', $_ENV['DATABASE_NAME']);
define('DB_USER', $_ENV['DATABASE_USER']);
define('DB_PASSWORD', $_ENV['DATABASE_PASSWORD']);
// define('TEST', $_ENV['TEST']);
// define('NOVAL', $_ENV['NOVAL']);
// define('NOVAL2', $_ENV['NOVAL2']);

//test if load from .env is successful or not
// ...

// echo "<pre>";
// var_dump(TEST);
// var_dump(NOVAL);
// var_dump(NOVAL2);
// var_dump(DB_HOST);
// echo "</pre>";
// die;
// echo "<br>";
// echo "<pre style='color: white;'>";
// var_dump($error);
// echo "</pre>";

const DB = [
    'HOST' => DB_HOST,
    'PORT' => DB_PORT,
    'NAME' => DB_NAME,
    'USER' => DB_USER,
    'PSWD' => DB_PASSWORD,
];



/**
 * List of possible actions/methodes (Routes configuration)
 */
$routes = [
    ''                  => ['AppController', 'index'],
    '/'                 => ['AppController', 'index'],
    '/signup'           => ['SecurityController', 'signup'],
    '/login'            => ['SecurityController', 'login'],
    '/logout'           => ['SecurityController', 'logout'],
    '/topic/delete'     => ['TopicController', 'delete'],
    '/topic/chat'       => ['TopicController', 'chat'],




];
