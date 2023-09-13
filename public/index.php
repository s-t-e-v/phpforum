<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:38:36 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-04 13:42:10
 * @Description: This is the entry point of the web application. It starts a
 *               session, loads every necessary parameters, load the home
 *               page by default and establish a connection with the database.
 */

session_start();
require_once(__DIR__ . '/../config/params.php');
require_once(__DIR__ . '/../config/router.php');
