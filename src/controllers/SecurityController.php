<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-07 00:13:49 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-08 17:34:52
 * @Description: Manage login/signup features
 */

class SecurityController extends Security
{

    /**
     * Perfom the user signup.
     */
    public static function signup()
    {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        //echo "<br>SIGN UP<br>!";

        if (!empty($_POST)) { // < Data submitted > 


            //echo "<h1>Data submtitted !</h1>";

            $error = []; // stores error messages

            /* Error raising */
            // -- Email
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "The <em>email</em> field is required and the email entered must be valid";
            } elseif (User::findByEmail(['email' => $_POST['email']])) { // Checking if the email already exist 
                $error['findByEmail'] = true;
                $_SESSION['messages']['danger'][] = "An account with the entered email already exists.";
            }
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

            /* Submitted data processing */
            if (empty($error)) {
                // If the uploaded image is valid
                if (empty($_FILES['pp']['name']) || self::valid_image()) {

                    $filename = "";
                    if (!empty($_FILES['pp']['name'])) {
                        /** Upload */
                        $filename = date('dmYHis') . $_FILES['pp']['name'];
                        $filename = str_replace(' ', '_', $filename); // we replace spaces by undescores
                        copy($_FILES['pp']['tmp_name'], PUBLIC_FOLDER . "upload" . DIRECTORY_SEPARATOR . $filename); // transfer from temp -> upload folder
                    }

                    /** Password encryption */
                    $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    /** Database processing */
                    $data = [
                        'email' => $_POST['email'],
                        'password' => $mdp,
                        'nickname' => $_POST['pseudo'],
                    ];
                    if ($filename)
                        $data['picture_profil'] = $filename;

                    User::add($data);

                    /** Success message */
                    $_SESSION['messages']['success'][] = "Congratulations ! You are registered in our forum. Now you can log in!";

                    /** Redirection */
                    header("location:" . BASE);
                    exit();
                } else {
                    /** Failure message */
                    $_SESSION['messages']['danger'][] = "The image format doesn't belong to those accepted (.jpg, .png, .webp, .gif) and/or the image is too large (>= 3 mo)";
                }
            }
        }

        // Page load
        include(VIEWS . 'security/signup.php');
    }


    /**
     * Log the user in.
     */
    public static function login()
    {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        //echo "<br>SIGN UP<br>!";

        if (!empty($_POST)) { // < Data submitted > 


            //echo "<h1>Data submtitted !</h1>";

            $error = []; // stores error messages

            /* Error raising */
            // -- Email
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "The <em>email</em> field is required and the email entered must be valid";
            }
            // -- Password
            if (empty($_POST['password'])) {
                $error['password'] = "The <em>password</em> field is required";
            }

            /* Submitted data processing */
            if (empty($error)) {

                // Retrieve the user by email
                $user = User::findByEmail(['email' => $_POST['email']]);

                // If the user exists
                if ($user) {
                    // If the password is valid
                    if (password_verify($_POST['password'], $user['password'])) // verify encrypted password
                    {
                        $_SESSION['user'] = $user; // We start a session for the use

                        $_SESSION['messages']['success'][] = "Welcome " . $user['nickname'] . "!!!"; // Welcome message

                        // Redirection home page
                        header('location:' . BASE);
                        exit();
                    } else // The password isn't valid
                    {
                        // Failure message
                        $_SESSION['messages']['danger'][] = "Error in the password";
                    }
                } else // no user was found
                {
                    // Failure message
                    $_SESSION['messages']['danger'][] = "There is no existing account with the email address";
                }
            }
        }

        // Page load
        include(VIEWS . 'security/login.php');
    }

    /**
     * Log the user out.
     */
    public static  function logout()
    {
        // We clear the user session
        unset($_SESSION['user']);

        // Message logout
        $_SESSION['messages']['info'][] = "See you soon !";

        // Redirection home page
        header("location:" . BASE);
        exit();
    }
}
