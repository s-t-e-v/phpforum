<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-09 14:50:14 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-11 23:36:51
 * @Description: Manages topics, including creating and deleting topics.
 */

class TopicController
{
    /**
     * Create a topic
     */
    public static function create()
    {

        /** Error raising */
        if (empty($_POST['title'])) {
            $_SESSION['error']['title'] = "The <em>topic</em> field is required.";
        }

        /* Submitted data processing */
        if (empty($_SESSION['error'])) {
            $data = [
                'title' => $_POST['title'],
                'id_user' => $_SESSION['user']['id'],
                'id_forum' => $_SESSION['default_forum']['id_forum'],
                'created_at' => date_format(new DateTime(), 'Y-m-d H:i:s'),
            ];

            // echo "<pre>";
            // var_dump($data);
            // echo "</pre>";

            Topic::add($data);

            /** Success message */
            $_SESSION['messages']['success'][] = "Your topic has been successfully created!";

            /** Redirection */
            header("location:" . BASE);
            exit();
        }
    }

    /**
     * Deletes a topic
     */
    public static function delete()
    {
        if (isset($_GET['id']) && isset($_GET['id'])) {
            /** Topic deletion */
            Topic::delete(['id' => $_GET['id']]);

            /** Success message */
            $_SESSION['messages']['success'][] = "Your topic has been successfully deleted!";
        }

        /** Redirection */
        header("location:" . BASE);
        exit();
    }

    /**
     * Display the chat page of the selected topic and manage message
     *  sending.
     */
    public static function chat()
    {

        //* removing every errors saved of the current session.
        unset($_SESSION['error']);

        //* if topic has been correctly transmitted
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            /** Message sending */
            if (!empty($_POST)) {
                MessageController::add_message();
            }
            /** Get topic information */
            $topic = Topic::findById(['id' => $_GET['id']]);
            /** Messages listing */
            $messages = Message::findByTopic(['id_topic' => $_GET['id']]);

            include(VIEWS . "app/chat.php");
        }
    }
}
