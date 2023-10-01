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

        if (!empty($_POST)) {
            $error = []; // stores error messages

            /* Error raising */
            // -- Pseudo
            if (empty($_POST['pseudo'])) {
                $error['pseudo'] = "The <em>pseudo</em> pseudo filed is required";
            } elseif (strlen($_POST['pseudo']) > 255) {
                $error['pseudo'] = "The <em>pseudo</em> input exceeds maximum length of 255 characters.";
            }
            // -- Email
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "The <em>email</em> field is required and the email entered must be valid";
            } elseif ($_SESSION['user']['email'] != $_POST['email'] && User::findByEmail(['email' => $_POST['email']])) { // Checking if the email already exist 
                $error['findByEmail'] = true;
                $_SESSION['messages']['danger'][] = "An account with the entered email already exists.";
            }
            // -- Profil picture
            if (strlen($_FILES['pp']['name']) > 200) {
                $error['pp'] = "The file name must not exceeds maximum length of 200 characters.";
            }


            /* Submitted data processing */
            if (empty($error)) {
                $_SESSION['messages']['success'][] = "No errors :)";
            }
        }

        include(VIEWS . 'user/profileEdit.php');
    }
}
