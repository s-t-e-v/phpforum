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

        include(VIEWS . 'user/profile.php');
    }

    public static function edit()
    {
        //* removing every errors saved of the current session.
        unset($_SESSION['error']);

        include(VIEWS . 'user/profile.php');
    }
}
