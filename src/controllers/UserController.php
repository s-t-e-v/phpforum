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
    public static function view()
    {
        //* removing every errors saved of the current session.
        unset($_SESSION['error']);


        /** Retrieve the user session data */
        $user = $_SESSION['user']; // main user data
        $default_forum = $_SESSION['default_forum']; // default forum
        $forums = Forum::findByUser(['id_user' => $user['id']]);
        $topics = Topic::findByUser(['id_user' => $user['id']]);

        // TODO: rearange $topics array into an array of array (associative ?). 
        // Subarrays correspond to the list of topics for a particular forum 
        // => will facilitate data display, especially the count of topics for each forum.

        include(VIEWS . 'user/profileView.php');
    }

    public static function edit()
    {
        //* removing every errors saved of the current session.
        unset($_SESSION['error']);


        // Retrieve the user by email
        $user = User::findByEmail(['email' => $_SESSION['user']['email']]);

        // Update user SESSION and default_forum SESSION
        // ...

        include(VIEWS . 'user/profileEdit.php');
    }
}
