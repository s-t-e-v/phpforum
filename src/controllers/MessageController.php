<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-11 21:00:29 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-11 23:50:01
 * @Description: Manages the creation of messages.
 */


class MessageController
{

    /**
     * Add a message posted by the user to the database
     */
    public static function add_message()
    {
        /** Error raising */
        if (empty($_POST['message']))
            $_SESSION['error']['message'] = "The field <em>answer</em> is required.";

        /* Submitted data processing */
        if (empty($_SESSION['error'])) {
            $data = [
                'content' => $_POST['message'],
                'id_user' => $_SESSION['user']['id'],
                'id_topic' => $_GET['id'],
                'created_at' => date_format(new DateTime(), 'Y-m-d H:i:s'),
            ];

            Message::add($data);

            // Chat page redirection
            header("location:" . BASE . 'topic/chat?id=' . $_GET['id']);
            exit();
        }
    }
}
