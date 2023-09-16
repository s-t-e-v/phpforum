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
            Err::err_report($e);
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
        try {

            $response->execute(self::htmlspecialchars($topic));
        } catch (Exception $e) {
            throw $e;
        }

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
}
