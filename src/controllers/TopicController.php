<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-09 14:50:14 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-09 15:21:15
 * @Description: Manages topics, including creating and deleting topics.
 */

class TopicController
{
    /**
     * Create a topic
     */
    public static function create()
    {
        $_SESSION['error'] = [];

        /** Error raising */
        if (empty($_POST['topic'])) {
            $_SESSION['error']['topic'] = "The <em>topic</em> field is required.";
        }

        /* Submitted data processing */
        if (empty($_SESSION['error'])) {
            $data = [
                'title' => $_POST['title'],
                'id_user' => $_SESSION['user']['id'],
                'created_at' => date_format(new DateTime(), 'Y-m-d H:i:s'),
            ];

            Topic::add($data);

            /** Success message */
            $_SESSION['messages']['success'][] = "Your topic has been successfully created!";

            /** Redirection */
            header("location:" . BASE);
            exit();
        }
    }
}
