<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:38:36 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-14 14:08:59
 * @Description: This is the entry point of the web application. It starts a
 *               session, loads every necessary parameters, load the home
 *               page by default and establish a connection with the database.
 */

session_start();

try {
    require_once(__DIR__ . '/../config/params.php');
    require_once(__DIR__ . '/../config/router.php');
} catch (Exception $e) {
    // Log the error
    error_log('Exception: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());

    // Error message [Development]
    // echo "<pre>";
    echo "<div class='bg-dark text-light p-3'>";
    echo "<p class='h3 pb-2'>Error message</p>";
    var_dump($e);
    echo "</div>";
    // echo "</pre>";

    // Display a user-friendly error message
    require_once PUBLIC_FOLDER . 'error.php'; // Create error.php to display the error message
    die;
}
