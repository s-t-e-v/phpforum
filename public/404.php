<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:36:53 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-04 13:37:48
 * @Description: Error 404 - Redirect to the home page with an error message .
 */

if (!session_status()) session_start();
$_SESSION['messages']['danger'][] = "The requested page doesn't exist";
AppController::index();
