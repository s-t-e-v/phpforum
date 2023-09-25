<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:43:20 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-20 23:43:06
 * @Description: AppController is a class containing the core methods to manage the app.
 */

class AppController
{
    /*
     + Loads the home page.
     */
    public static function index()
    {
        //* Indicate that we are at home page for conditional displays
        $_SESSION['is_home_page'] = true;
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
        /** Forum name */
        $current_forum = null;
        if (isset($_SESSION['forum']))
            $current_forum = Forum::findByURLName(['url_name' => $_SESSION['forum']]);

        include(VIEWS . 'app/index.php');
    }

    /**
     * Loads the creation forum page
     */
    public static function create_forum()
    {
        //* removing every errors saved of the current session.
        unset($_SESSION['error']);

        /** topic creation */
        if (!empty($_POST)) {
            // echo "<pre style='color: white;'>";
            // var_dump($_POST);
            // echo "</pre>";
            ForumController::create();
        }

        include(VIEWS . 'app/create_forum.php');
    }
}
