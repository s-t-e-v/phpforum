<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:43:20 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-27 00:20:27
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
        /** Forum name */
        $current_forum = Forum::findByURLName(['url_name' => $_SESSION['forum']]);
        /** topics listing */
        $topics = Topic::findByForum(['id_forum' => $current_forum['id'] ?? null]); // Retrieve topics
        /** forums listing */
        $forums = Forum::findAll();
        // remove current forum & orginal forum from listing 
        if ($current_forum) {

            foreach ($forums as $key => $forum) {
                if ($forum['id'] === $current_forum['id'] || $forum['id'] === 1) {
                    unset($forums[$key]); // Remove the forum that matches the condition
                }
            }
        }

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
