<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-20 23:10:19 
 * @Last Modified by:   undefined 
 * @Last Modified time: 2023-09-20 23:10:19
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
        $request = "INSERT INTO forum (name, id_user, created_at) VALUES (:name, :id_user, :created_at)";
        $response = $pdo->prepare($request);
        try {
            $response->execute(self::htmlspecialchars($data));
        } catch (Exception $e) {
            $_SESSION['messages']['danger'][] = "An error occured when creating the forum. If the issue persists, please contact the admin staff.";
            Err::reportError($e);
        }

        return $pdo->lastInsertId();
    }
}
