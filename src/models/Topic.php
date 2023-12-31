<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-09 15:02:00 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-11 23:27:04
 * @Description: Topic database management
 */

class Topic extends Db
{
    /**
     * Add the topic to the database
     * 
     * @param array $data: title, id_user, id_forum and created_at (associative array)
     * @return string last insert id message
     */
    public static function add($data): string
    {
        $pdo = self::getDb();
        $request = "INSERT INTO topic (title, id_user, id_forum, created_at) VALUES (:title, :id_user, :id_forum, :created_at)";
        $response = $pdo->prepare($request);
        try {
            $response->execute(self::htmlspecialchars($data));
        } catch (Exception $e) {
            $_SESSION['messages']['danger'][] = "An error occured when adding the topic. If the issue persists, please contact the admin staff.";
            Err::reportError($e);
        }

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
        try {
            $response->execute();
        } catch (Exception $e) {
            throw $e;
        }

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the list of all topics corresponding to the requested forum. 
     * Each topics data are combined with their corresponding creator id 
     * and nickname.
     * 
     * @param array: $forum: forum id (associative array)
     * @return mixed: associative array if no failure. If there is no rows, an
     * empty array is returned. If there is failure, False is returned.
     */
    public static function findByForum($forum): mixed
    {
        $request = "SELECT topic.*, user.nickname, user.picture_profil FROM topic INNER JOIN user ON topic.id_user = user.id WHERE topic.id_forum=:id_forum ORDER BY topic.created_at DESC";
        $response = self::getDb()->prepare($request);
        try {
            $response->execute(self::htmlspecialchars($forum));
        } catch (Exception $e) {
            throw $e;
        }

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the requested topic.
     * 
     * @param array $id: topic id (associative array)
     * @return mixed: associative array if no failure. If there is no rows, an
     * empty array is returned. If there is failure, False is returned.
     */
    public static function findById(array $id): mixed
    {
        $request = "SELECT * FROM topic WHERE id=:id";
        $response = self::getDb()->prepare($request);
        try {
            $response->execute(self::htmlspecialchars($id));
        } catch (Exception $e) {
            throw $e;
        }

        return $response->fetch(PDO::FETCH_ASSOC);
    }

    public static function findByUser(array $user)
    {
        $request = "SELECT topic.*, forum.name, forum.url_name FROM topic INNER JOIN forum ON topic.id_forum = forum.id WHERE topic.id_user = :id_user ORDER BY id_forum ASC";
        $response = self::getDb()->prepare($request);
        try {
            $response->execute(self::htmlspecialchars($user));
        } catch (Exception $e) {
            throw $e;
        }

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Deletes the requested forum.
     * When a topic is deleted, all the related messages are deleted: 'message' 
     * and 'topic' are linked by a foreign key
     * 
     * @param array $id: topic id (associative array)
     * @return mixed: PDO statement if success, False if failure.
     */
    public static function delete($id): mixed
    {
        $pdo = self::getDb();

        $request = "DELETE FROM topic WHERE id = :id";
        $response = $pdo->prepare($request);
        try {
            $response->execute(self::htmlspecialchars($id));
        } catch (Exception $e) {
            throw $e;
        }

        return $response;
    }
}
