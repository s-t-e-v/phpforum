<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:12:05 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-04 13:29:00
 * @Description: Instanciate a PDO object to connect with database
 */

try {
    $bdd = new PDO(
        'mysql:host=' . CONFIG['db']['DB_HOST'] . ';dbname=' . CONFIG['db']['DB_NAME'] . ';charset=utf8;port=' . CONFIG['db']['DB_PORT'],
        CONFIG['db']['DB_USER'],
        CONFIG['db']['DB_PSWD'],
        [
            'ATTR_ERRMODE' => PDO::ERRMODE_EXCEPTION,
        ]
    );
} catch (Exception $e) {
    // TODO: Don't display var_dump on production
    echo "<pre>";
    var_dump($e);
    echo "</pre>";
    die;
}
