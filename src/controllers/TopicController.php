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
        } elseif (strlen($_POST['title']) > 255) {
            $_SESSION['error']['title'] = "The <em>topic name</em> input exceeds maximum length of 255 characters.";
        }


        /* Submitted data processing */
        if (empty($_SESSION['error'])) {
            // var_dump($_SESSION);

            /** Curent forum id */
            $current_forum = Forum::findByURLName(['url_name' => $_SESSION['forum']]);

            $data = [
                'title' => $_POST['title'],
                'id_user' => $_SESSION['user']['id'],
                'id_forum' => $current_forum['id'],
                'created_at' => date_format(new DateTime(), 'Y-m-d H:i:s'),
            ];

            // echo "<pre>";
            // var_dump($data);
            // echo "</pre>";
            // die;

            $success = Topic::add($data);

            /** Success message */
            if ($success)
                $_SESSION['messages']['success'][] = "Your topic has been successfully created!";

            /** Redirection */
            $forum_url = $_SESSION['forum'] ? "f/" . $_SESSION['forum'] . "/" : "";
            header("location:" . BASE . $forum_url);
            exit();
        }
    }

    /**
     * Deletes a topic
     */
    public static function delete()
    {
        if (isset($_GET['id']) && isset($_GET['id'])) {

            $topic = Topic::findById(['id' => $_GET['id']]);

            if ($topic && ($topic['id_user'] === $_SESSION['user']['id'])) {
                /** Topic deletion */
                $success = Topic::delete(['id' => $_GET['id']]);

                /** Success message */
                if ($success)
                    $_SESSION['messages']['success'][] = "Your topic has been successfully deleted!";
            } else {
                /** Redirection to home page*/
                header('location:' . BASE);
                exit();
            }
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
            /** Get topic information */
            $topic = Topic::findById(['id' => $_GET['id']]);

            if ($topic) {
                /** Message sending */
                if (!empty($_POST)) {
                    MessageController::add_message();
                }
                /** Messages listing */
                $messages = Message::findByTopic(['id_topic' => $_GET['id']]);
                // echo "YO!!!";
                // echo "<pre>";
                // var_dump($messages);
                // echo "</pre>";
                // die;
            } else {
                $_SESSION['messages']['danger'][] = "The requested page doesn't exist";

                /** Redirection to home page*/
                header('location:' . BASE);
                exit();
            }
            // view load
            include(VIEWS . "app/chat.php");
        }
    }
}
