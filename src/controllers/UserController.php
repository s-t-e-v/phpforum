<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-27 17:43:07 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-27 17:56:40
 * @Description: Controlls display and edition of the user profil
 */

class UserController
{
    public static function view()
    {
        //* removing every errors saved of the current session.
        unset($_SESSION['error']);


        // Retrieve the user by email
        $user = User::findByEmail(['email' => $_SESSION['user']['email']]);


        include(VIEWS . 'user/profile.php');
    }

    public static function edit()
    {
        //* removing every errors saved of the current session.
        unset($_SESSION['error']);



        // Update user SESSION and default_forum SESSION

        include(VIEWS . 'user/profile.php');
    }
}
