<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:43:20 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-09 18:08:04
 * @Description: AppController is a class containing the core methods to manage the app.
 */

class AppController
{
    /*
     + Loads the home page.
     */
    public static function index()
    {
        //* removing every errors saved of the current session.
        unset($_SESSION['error']);

        /** topic creation */
        if (!empty($_POST)) {
            // echo "<pre style='color: white;'>";
            // var_dump($_POST);
            // echo "</pre>";
            TopicController::create();
        }
        /** topics listing */
        $topics = Topic::findAll(); // Retrieve topics


        include(VIEWS . 'app/index.php');
    }
}
