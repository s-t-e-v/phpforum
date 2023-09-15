<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:38:36 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-15 03:25:46
 * @Description: This is the entry point of the web application. It starts a
 *               session, loads every necessary parameters, load the home
 *               page by default and establish a connection with the database.
 */

session_start();

try {
    require_once(__DIR__ . '/../config/config.php');
    require_once(__DIR__ . '/../config/router.php');
} catch (Exception $e) {
    // if ($e instanceof Err && $e->getErrorType() === 'fatal') {
    //     // This is a fatal error, display a special message with alert
    //     echo "<div class='alert alert-danger' role='alert'>";
    //     echo "A fatal error occurred: " . $e->getMessage();
    //     echo "</div>";
    //     die;
    // }
    //  else {
    // This is a non-fatal error, display a user-friendly error message

    // var_dump($e->getErrorType());
    // echo "ERRRRRRRRORRR!";
    // Check the PHP.ini configuration for error display
    if (ini_get('display_errors') && $e) {
        $_SESSION['debug'] = $e;
    }


    // var_dump($e);
    // echo $e->getErrorType();
    // die;

    // Log the error
    error_log('Exception: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());

    require_once PUBLIC_FOLDER . 'error.php';
    // }

}
