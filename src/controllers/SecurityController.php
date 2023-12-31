<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-07 00:13:49 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-29 02:00:23
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
            } elseif (strlen($_POST['pseudo']) > 255) {
                $error['pseudo'] = "The <em>pseudo</em> input exceeds maximum length of 255 characters.";
            }
            // -- Profil picture
            if (strlen($_FILES['pp']['name']) > 255) {
                $error['pp'] = "The file name must not exceeds maximum length of 255 characters.";
            }


            /* Submitted data processing */
            if (empty($error)) {

                try {
                    // Check if the image is valid
                    if (!empty($_FILES['pp']['name']) && !self::valid_image())
                        throw new Err("The image format doesn't belong to those accepted (.jpg, .png, .webp, .gif) and/or the image is too large (>= 3 mo)", Err::ERROR_TYPE_NOTICE);
                    // File upload handling
                    $filename = "";
                    if (!empty($_FILES['pp']['name'])) {
                        /** Upload */
                        $filename = date('dmYHis') . $_FILES['pp']['name'];
                        $filename = str_replace(' ', '_', $filename); // we replace spaces by undescores

                        // Check if the file upload was successful
                        if ($_FILES['pp']['error'] !== UPLOAD_ERR_OK) {
                            // Handle the error
                            $err = new Err("File upload failed with error code " . $_FILES['pp']['error']);
                            $err->setUserMessage("An error occured during upload. If the issue persits, please contact the admin staff.");
                            throw $err;
                        }

                        $tempFilePath = $_FILES['pp']['tmp_name'];
                        $destinationDir = PUBLIC_FOLDER . "upload" . DIRECTORY_SEPARATOR;

                        // Check if the temp file is readable
                        if (!is_readable($tempFilePath)) {
                            throw new Err("Web server can't read the uploaded file", Err::ERROR_TYPE_CRITICAL);
                        }

                        // Check if the destination directory is writable
                        if (!is_writable($destinationDir)) {
                            throw new Err("Web server can't write to the destination directory", Err::ERROR_TYPE_CRITICAL);
                        }

                        $destinationFile = $destinationDir . $filename;

                        // Now copy the file
                        if (!copy($tempFilePath, $destinationFile)) {
                            $err = new Err("Web server failed to copy file from $tempFilePath to $destinationFile.");
                            $err->setUserMessage("An error occured during upload. If the issue persits, please contact the admin staff.");
                            throw $err;
                        }
                    }


                    /** Password encryption */
                    $pswd = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    /** Database processing */
                    // -- User
                    $data = [
                        'email' => $_POST['email'],
                        'password' => $pswd,
                        'nickname' => $_POST['pseudo'],
                    ];
                    if ($filename)
                        $data['picture_profil'] = $filename;

                    $success_add_user = User::add($data);
                    // -- Default forum
                    $user =  User::findByEmail(['email' => $_POST['email']]);
                    $data = [
                        'id_user' => $user['id'],
                        'id_forum' => 1,
                    ];
                    $success_up_default_forum = Default_forum::update_db($data);

                    /** Success message */
                    $success = $success_add_user && $success_up_default_forum;
                    if ($success) {
                        $_SESSION['messages']['success'][] = "Congratulations! You are registered in our forum. Now you can log in!";
                    }

                    /** Redirection */
                    header("location:" . BASE);
                    exit();
                } catch (Err $e) {
                    // Handle the error based on severity
                    if ($e->isCriticalError()) {
                        throw $e; // Redirect to dedicated error page
                    } else {
                        // Display user-friendly error message
                        $_SESSION['messages']['danger'][] = $e->getUserMessage();

                        if ($e->isSeriousError()) {
                            // Log the error
                            error_log($e->getMessage());
                        }
                    }
                } catch (Exception $e) {
                    // Handle the exception as needed
                    throw $e;
                }
            }
        }

        // View load
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
            if (User::findByEmail(['email' => $_POST['email']])) {
            } else if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
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
                        $_SESSION['user'] = $user; // We start a session for the user

                        $default_forum = Default_forum::findByUserId(['id' => $user['id']]);
                        $_SESSION['default_forum'] = $default_forum; // We start a session for the default forum of the user

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
        unset($_SESSION['default_forum']);

        // Message logout
        $_SESSION['messages']['info'][] = "See you soon !";

        // Redirection home page
        header("location:" . BASE);
        exit();
    }

    /**
     * Change the user password.
     */
    public static function change_pswd()
    {
        //* removing every errors saved of the current session.
        unset($_SESSION['error']);

        if (!empty($_POST)) { // < Data submitted > 

            $error = []; // stores error messages

            /* Error raising */
            // -- Password
            if (empty($_POST['old_pswd'])) {
                $error['old_pswd'] = "The <em>old password</em> field is required";
            }
            // -- New password
            if (empty($_POST['new_pswd']) || !self::valid_pass($_POST['new_pswd'])) {
                $error['new_pswd'] = "The <em>password</em> field is required and the entered password must contain at least 5 characteres, whom at least 1 lowercase, 1 uppercase, 1 digit and 1 special character";
            }
            // -- Confirm new password
            if (empty($_POST['confirm_new_pswd'])) {
                $error['confirm_new_pswd'] = "The <em>confirm new password</em> field is required";
            } elseif ($_POST['confirm_new_pswd'] !== $_POST['new_pswd']) {
                $error['confirm_new_pswd'] = "The password must match with the one entered above";
            }

            /* Submitted data processing */
            if (empty($error)) {

                // If the old password is valid
                if (password_verify($_POST['old_pswd'], $_SESSION['user']['password'])) // verify encrypted password
                {
                    $pswd = password_hash($_POST['new_pswd'], PASSWORD_DEFAULT);

                    /** Database processing */
                    // -- User
                    $data = [
                        'id' => $_SESSION['user']['id'],
                        'password' => $pswd,
                    ];

                    $success = User::pswd_update($data);

                    // Update the user session
                    $_SESSION['user'] = User::findByEmail(['email' => $_SESSION['user']['email']]);; // Update the session

                    /** Success message */
                    if ($success)
                        $_SESSION['messages']['success'][] = "The password has been succesfully changed!!";

                    // Redirection home page
                    header('location:' . BASE . 'user/profile/security');
                    exit();
                } else // The password isn't valid
                {
                    // Failure message
                    $_SESSION['messages']['danger'][] = "Error in the old password";
                }
            }
        }

        include(VIEWS . 'user/security.php');
    }
}
