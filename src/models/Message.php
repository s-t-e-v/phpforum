<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-11 20:58:09 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-11 22:41:07
 * @Description: Messages database management
 */

class Message extends Db
{
    /**
     * Add a message to the database 
     */
    public static function add($data)
    {
        $pdo = self::getDb();
        $request = "INSERT INTO message (content, id_user, id_topic, created_at) VALUE (:content, :id_user, :id_topic, :created_at)";
        $response = $pdo->prepare($request);
        $response->execute(self::htmlspecialchars($data));

        return $pdo->lastInsertId();
    }

    public static function findByTopic($topic)
    {
        $request = "SELECT message.*, user.nickname, user.picture_profil FROM message INNER JOIN user ON message.id_user = user.id WHERE message.id_topic=:id_topic  ORDER BY message.created_at ASC";
        $response = self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($topic));

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
}
