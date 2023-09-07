<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-07 00:13:49 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-07 00:28:50
 * @Description: Manage login/signup features
 */

class SecurityController
{
    /*
     * Loads the signup page.
     */
    public static function signup()
    {
        // If the user submitted data
        if (!empty($_POST)) {

            // error variable: stores error messages
            $error = [];

            /*
             * Checks wether the entered password is valid or not
             * @param string $candidate The password
             * @return boolean True if valid, False otherwise
             */
            function valid_pass($candidate)
            {
                $r1 = '/[A-Z]/';  //Uppercase
                $r2 = '/[a-z]/';  //lowercase
                $r3 = '/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
                $r4 = '/[0-9]/';  //numbers

                if (preg_match_all($r1, $candidate, $o) < 1) return FALSE;

                if (preg_match_all($r2, $candidate, $o) < 1) return FALSE;

                if (preg_match_all($r3, $candidate, $o) < 1) return FALSE;

                if (preg_match_all($r4, $candidate, $o) < 1) return FALSE;

                if (strlen($candidate) < 7) return FALSE;

                return TRUE;
            }

            /* Error raising */
            // -- Email
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "The <em>email</em> email field is mandatory and the email entered must be valid";
            }
            // > TODO: check also if the user already exists
            // -- Password
            if (empty($_POST['password']) || !valid_pass($_POST['password'])) {
                $error['password'] = "The <em>password</em> field is mandatory and the entered password must contain at least 5 characteres, whom at least 1 lowercase, 1 uppercase, 1 digit and 1 special character";
            }
            // -- Password confirmation
            if (empty($_POST['confirmPassword'])) {
                $error['confirmPassword'] = "The <em>password confirmation</em> field is mandatory";
            } elseif ($_POST['confirmPassword'] !== $_POST['password']) {
                $error['confirmPassword'] = "The password must match with the one entered above";
            }
            // -- Pseudo
            if (empty($_POST['pseudo'])) {
                $error['pseudo'] = "The <em>pseudo</em> pseudo filed is mandatory";
            }
            // Profil picture
            // if (empty($_FILES['pp']['name'])) {
            //     $error['pp'] = "le champs <em>Photo de profile</em> est obligatoire";
            // }

            /* Submitted data processing */
            if (empty($error)) {
            }
        }

        // Page load
        include(VIEWS . 'security/signup.php');
    }
}
