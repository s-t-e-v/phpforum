<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-01 17:34:57 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-01 23:43:10
 * @Description: App configuration
 */


/**
 * General App configuration
 */
const CONFIG = [
    'db' => [
        'DB_HOST' => 'localhost',
        'DB_PORT' => '3306',
        'DB_NAME' => 'phpforum',
        'DB_USER' => 'root',
        'DB_PSWD' => '',
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





];
