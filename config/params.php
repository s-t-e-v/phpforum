<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-01 17:34:57 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-07 00:11:52
 * @Description: App configuration
 */


/**
 * General App configuration
 */
require_once(__DIR__ . '/../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Define the constants
define('DB_HOST', $_ENV['DATABASE_HOST']);
define('DB_PORT', $_ENV['DATABASE_PORT']);
define('DB_NAME', $_ENV['DATABASE_NAME']);
define('DB_USER', $_ENV['DATABASE_USER']);
define('DB_PASSWORD', $_ENV['DATABASE_PASSWORD']);

const CONFIG = [
    'db' => [
        'DB_HOST' => DB_HOST,
        'DB_PORT' => DB_PORT,
        'DB_NAME' => DB_NAME,
        'DB_USER' => DB_USER,
        'DB_PSWD' => DB_PASSWORD,
    ],
    'app' => [
        'name' => 'phpforum',
        'projectBaseUrl' => 'http://localhost/phpforum'
    ]
];

/**
 * Constants for quick access to important MVC folders
 */
// url constant (to be used in href=/src=)
const BASE = CONFIG['app']['projectBaseUrl'] . '/public/index.php/';
// directory constants (to be used in requires/includes)
const BASE_DIR = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
const UPLOAD = CONFIG['app']['projectBaseUrl'] . '/public/upload/';
const PUBLIC_FOLDER = BASE_DIR . 'public\\';
const VIEWS = BASE_DIR . 'views/';
const MODELS = BASE_DIR . 'src/models/';
const CONTROLLERS = BASE_DIR . 'src/controllers/';


/**
 * List of possible actions/(methodes or other term in english?) (Routes configuration)
 */
$routes = [
    ''                  => ['AppController', 'index'],
    '/'                 => ['AppController', 'index'],
    '/signup'           => ['SecurityController', 'signup'],




];
