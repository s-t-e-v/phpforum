<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-11 20:58:09 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-15 03:22:55
 * @Description: Messages database management
 */

class Message extends Db
{
    /**
     * Add a message to the database. 
     * 
     * @param array $data: content, id_user and created_at (associative array)
     * @return string last insert id message
     */
    public static function add($data): string
    {
        $pdo = self::getDb();
        $request = "INSERT INTO message (content, id_user, id_topic, created_at) VALUE (:content, :id_user, :id_topic, :created_at)";
        $response = $pdo->prepare($request);
        try {
            $response->execute(self::htmlspecialchars($data));
        } catch (Exception $e) {
            $_SESSION['messages']['danger'][] = "An error occured when sending the message. If the issue persists, please contact the admin staff.";
            // Create a custom Err instance with a 'fatal' error type
            // $err = new Err($e->getMessage(), 'non-fatal');

            Err::err_report($e);
            // echo "<pre>";
            // var_dump($err);
            // echo "</pre>";
            // die;

            // throw $err;
        }

        return $pdo->lastInsertId();
    }

    /**
     * Get the messages correponding to the requested topic.
     *
     * @param array $topic: topic id (associative array)
     * @return mixed: associative array if no failure. If there is no rows, an
     * empty array is returned. If there is failure, False is returned.
     */
    public static function findByTopic($topic): mixed
    {
        $request = "SELECT message.*, user.nickname, user.picture_profil FROM message INNER JOIN user ON message.id_user = user.id WHERE message.id_topic=:id_topic  ORDER BY message.created_at ASC";
        $response = self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($topic));

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
}
