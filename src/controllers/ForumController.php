<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-20 20:17:50 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-20 23:27:30
 * @Description: Methods related to forums management.
 */

class ForumController
{
    /**
     * Create a forum
     */
    public static function create()
    {
        /** Error raising */
        if (empty($_POST['forum']))
            $_SESSION['error']['forum'] = "The field <em>forum name</em> is required.";
        else if (strlen($_POST['forum']) > 70)
            $_SESSION['error']['forum'] = "The <em>forum name</em> input exceeds maximum length of 70 characters.";

        /* Submitted data processing */
        if (empty($_SESSION['error'])) {
            $data = [
                'name' => $_POST['forum'],
                'url_name' => App::convertToURLFriendly($_POST['forum']),
                'id_user' => $_SESSION['user']['id'],
                'created_at' => date_format(new DateTime(), 'Y-m-d H:i:s'),
            ];

            $success = Forum::add($data);

            /** Success message */
            if ($success)
                $_SESSION['messages']['success'][] = "Your forum has been successfully created!";

            // Home page redirection
            header("location:" . BASE);
            exit();
        }
    }
}
