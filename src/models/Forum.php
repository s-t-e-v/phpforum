<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-20 23:10:19 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-27 02:53:32
 * @Description: Forum database management
 */

class Forum extends Db
{
    /**
     * Add the forum to the database
     * 
     * @param array $data: name, id_user, and created_at (associative array)
     * @return string last insert id message
     */
    public static function add($data): string
    {
        $pdo = self::getDb();
        $request = "INSERT INTO forum (name, url_name, id_user, created_at) VALUES (:name, :url_name, :id_user, :created_at)";
        $response = $pdo->prepare($request);
        try {
            $response->execute(self::htmlspecialchars($data));
        } catch (Exception $e) {
            $_SESSION['messages']['danger'][] = "An error occured when creating the forum. If the issue persists, please contact the admin staff.";
            Err::reportError($e);
        }

        return $pdo->lastInsertId();
    }


    /**
     * Get the requested forum by url name.
     * 
     * @param array $url_name: url_name (associative array)
     * @return mixed: associative array if no failure. If there is no rows, an
     * empty array is returned. If there is failure, False is returned.
     */
    public static function findByURLName($url_name): mixed
    {
        $request = "SELECT * FROM forum WHERE url_name=:url_name";
        $response = self::getDb()->prepare($request);
        try {
            $response->execute(self::htmlspecialchars($url_name));
        } catch (Exception $e) {
            throw $e;
        }

        return $response->fetch(PDO::FETCH_ASSOC);
    }


    /**
     * 
     * Get the list of all forums.
     * 
     * @return mixed: associative array if no failure. If there is no rows, an
     * empty array is returned. If there is failure, False is returned.
     */
    public static function findAll(): mixed
    {
        $request = "SELECT * FROM forum";
        $response = self::getDb()->prepare($request);
        try {
            $response->execute();
        } catch (Exception $e) {
            throw $e;
        }

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
}
