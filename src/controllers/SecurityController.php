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

    /**
     * Checks wether the entered password is valid or not
     * @param string $candidate The password
     * @return bool True if valid, False otherwise
     */
    private static function valid_pass($candidate): bool
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

    /**
     * Checks wether the image is valid or not
     * @return bool True if valid, False otherwise
     */
    private static function valid_image(): bool
    {
        return (($_FILES['pp']['type'] == 'image/jpeg' ||
            $_FILES['pp']['type'] == 'image/png' ||
            $_FILES['pp']['type'] == 'image/webp' ||
            $_FILES['pp']['type'] == 'image/gif')  &&
            $_FILES['pp']['size'] < 3000000);
    }

    /**
     * Perfom the user signup.
     */
    public static function signup()
    {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        echo "<br>SIGN UP<br>!";

        if (!empty($_POST)) { // < Data submitted > 


            echo "<h1>Data submtitted !</h1>";

            $error = []; // stores error messages

            /* Error raising */
            // -- Email
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "The <em>email</em> field is required and the email entered must be valid";
            }
            // > TODO: check also if the email already exists
            // -- Password
            if (empty($_POST['password']) || !self::valid_pass($_POST['password'])) {
                $error['password'] = "The <em>password</em> field is required and the entered password must contain at least 5 characteres, whom at least 1 lowercase, 1 uppercase, 1 digit and 1 special character";
            }
            // -- Password confirmation
            if (empty($_POST['confirmPassword'])) {
                $error['confirmPassword'] = "The <em>password confirmation</em> field is required";
            } elseif ($_POST['confirmPassword'] !== $_POST['password']) {
                $error['confirmPassword'] = "The password must match with the one entered above";
            }
            // -- Pseudo
            if (empty($_POST['pseudo'])) {
                $error['pseudo'] = "The <em>pseudo</em> pseudo filed is required";
            }
            // > TODO: check also if the pseudo already exists
            // Profil picture
            // if (empty($_FILES['pp']['name'])) {
            //     $error['pp'] = "le champs <em>Photo de profile</em> est obligatoire";
            // }

            /* Submitted data processing */
            if (empty($error)) {
                // If the uploaded image is valid
                if (empty($_FILES['pp']['name']) || self::valid_image()) {
                    /** Upload */

                    /** Success message */
                    $_SESSION['messages']['success'][] = "Congratulations ! You are registered in our forum. Now you can connect!";
                } else {
                    /** Failure message */
                    $_SESSION['messages']['danger'][] = "The image format doesn't belong to those accepted (.jpg, .png, .webp, .gif) and/or the image is too large (>= 3 mo)";
                }
            }
        }

        // Page load
        include(VIEWS . 'security/signup.php');
    }
}
