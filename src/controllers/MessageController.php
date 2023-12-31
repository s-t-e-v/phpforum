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
        else if (strlen($_POST['message']) > 65535)
            $_SESSION['error']['message'] = "The <em>answer</em> input exceeds maximum length of 65,535 characters.";

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
            $forum_url = isset($_SESSION['forum']) ? "f/" . $_SESSION['forum'] . "/" : "";
            header("location:" . BASE . $forum_url . 'topic/chat?id=' . $_GET['id']);
            exit();
        }
    }
}
