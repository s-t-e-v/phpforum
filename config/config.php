<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-01 17:34:57 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-29 01:32:40
 * @Description: App configuration
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
 * GENERAL APP CONFIGURATION
 */
const APP_NAME = 'phpforum';
const APP_PROJECT_BASE_URL = 'http://phpforum';

/**
 * Constants for quick access to important MVC folders
 */
// url constant (to be used in href=/src=)
const BASE = APP_PROJECT_BASE_URL . DIRECTORY_SEPARATOR;
const UPLOAD = APP_PROJECT_BASE_URL . '/upload/';
const ASSETS = APP_PROJECT_BASE_URL . '/assets/';
// directory constants (to be used in requires/includes)
const BASE_DIR = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
const PUBLIC_FOLDER = BASE_DIR . 'public/';
const VIEWS = BASE_DIR . 'views/';
const MODELS = BASE_DIR . 'src/models/';
const CONTROLLERS = BASE_DIR . 'src/controllers/';

/**
 * Database parameters
 */

// init_set error log
ini_set('error_log', __DIR__ . '/../error_log/error.log');

// env var
require_once(__DIR__ . '/../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
try {
    $dotenv->load();
} catch (Exception $e) {
    throw $e;
}

// Define the constants
define('DB_HOST', $_ENV['DATABASE_HOST']);
define('DB_PORT', $_ENV['DATABASE_PORT']);
define('DB_NAME', $_ENV['DATABASE_NAME']);
define('DB_USER', $_ENV['DATABASE_USER']);
define('DB_PASSWORD', $_ENV['DATABASE_PASSWORD']);

// TODO: remove DB and use the define constant directly if at the end the array is no more necessary
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
    ''                          => ['AppController', 'index'],
    'add'                       => ['AppController', 'create_forum'],
    'signup'                    => ['SecurityController', 'signup'],
    'login'                     => ['SecurityController', 'login'],
    'logout'                    => ['SecurityController', 'logout'],
    'topic/delete'              => ['TopicController', 'delete'],
    'topic/chat'                => ['TopicController', 'chat'],
    'user/profile'              => ['UserController', 'view'],
    'user/profile/edit'         => ['UserController', 'edit'],
    'user/profile/security'     => ['SecurityController', 'change_pswd'],


];
