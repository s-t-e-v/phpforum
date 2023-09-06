<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-07 00:13:49 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-07 00:15:46
 * @Description: Manage login/signup features
 */

class SecurityController
{
    /*
     * Loads the signup page.
     */
    public static function signup()
    {
        include(VIEWS . 'security/signup.php');
    }
}
