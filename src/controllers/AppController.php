<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:43:20 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-09 15:44:34
 * @Description: AppController is a class containing the core methods to manage the app.
 */

class AppController
{
    /*
     + Loads the home page.
     */
    public static function index()
    {

        include(VIEWS . 'app/index.php');
    }
}
