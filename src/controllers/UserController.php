<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-27 17:43:07 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-29 00:20:20
 * @Description: Controlls display and edition of the user profil
 */

class UserController
{
    /**
     * Display user profile view.
     */
    public static function view()
    {
        // Retrieve user session data
        $user = $_SESSION['user'];
        $default_forum = $_SESSION['default_forum'];
        $forums = Forum::findByUser(['id_user' => $user['id']]);
        $topics = Topic::findByUser(['id_user' => $user['id']]);

        // Rearrange topics into an array grouped by forum for easier display
        $topicsByForum = [];

        foreach ($topics as $topic) {
            $forumName = $topic['name'];
            $topicsByForum[$forumName][] = $topic;
        }

        // Load the page
        include(VIEWS . 'user/profileView.php');
    }


    public static function edit()
    {
        //* removing every errors saved of the current session.
        unset($_SESSION['error']);

        // Retrieve user session data
        $user = $_SESSION['user'];
        $default_forum = $_SESSION['default_forum'];
        $forums = Forum::findByUser(['id_user' => $user['id']]);
        $topics = Topic::findByUser(['id_user' => $user['id']]);

        // Rearrange topics into an array grouped by forum for easier display
        $topicsByForum = [];

        foreach ($topics as $topic) {
            $forumName = $topic['name'];
            $topicsByForum[$forumName][] = $topic;
        }

        include(VIEWS . 'user/profileEdit.php');
    }
}
