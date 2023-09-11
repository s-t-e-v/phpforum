<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-11 20:58:09 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-11 22:10:04
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
        $request = "INSERT INTO message (content, id_user, id_topic, created_at) VALUE (:content, :id_user, :id_topic, :created_at";
        $response = $pdo->prepare($request);
        $response->execute(self::htmlspecialchars($data));

        return $pdo->lastInsertId();
    }
}
