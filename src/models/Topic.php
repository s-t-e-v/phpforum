<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-09 15:02:00 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-11 17:33:08
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

    /**
     * Get the requested topic
     * 
     * @return mixed: associative array if no failure. If there is no rows, an
     * empty array is returned. If there is failure, False is returned.
     */
    public static function findById(array $id): mixed
    {
        $request = "SELECT * FROM topic WHERE id=:id";
        $response = self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($id));

        return $response->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Deletes the requested forum.
     * When a topic is deleted, all the related messages are deleted: 'message' 
     * and 'topic' are linked by a foreign key
     * 
     * @return mixed: PDO statement if success, False if failure.
     */
    public static function delete($id): mixed
    {
        $pdo = self::getDb();

        $request = "DELETE FROM topic WHERE id = :id";
        $response = $pdo->prepare($request);
        $response->execute(self::htmlspecialchars($id));

        return $response;
    }
}
