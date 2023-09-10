<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-09 15:02:00 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-09 15:32:23
 * @Description: Topic database management
 */

class Topic extends Db
{
    /**
     * Add the topic to the database
     */
    public static function add($data)
    {
        $pdo = self::getDb();
        $request = "INSERT INTO topic (title, id_user, id_forum, created_at) VALUES (:title, :id_user, :id_forum, :created_at)";
        $response = $pdo->prepare($request);
        $response->execute(self::htmlspecialchars($data));

        return $pdo->lastInsertId();
    }

    /**
     * Get the list of all topics. Each topics data are combined with
     *  their corresponding creator id and nickname.
     * 
     * @return mixed: associative array if no failure. If there is no rows, an
     * empty array is returned. If there is failure, False is returned.
     */
    public static function findAll(): mixed
    {
        $request = "SELECT topic.*, user.nickname, user.picture_profil FROM topic INNER JOIN user ON topic.id_user = user.id ORDER BY topic.created_at DESC";
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
}
