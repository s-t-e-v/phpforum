<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-09 15:41:10 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-09 17:07:54
 * @Description: Default forums database management
 */

class Default_forum extends Db
{
    /**
     * Update the database of default forums when a change
     * occurs with a user regarding that property
     * 
     * @param array $data
     * @return string last inserted id message
     */
    public static function update_db($data): string
    {
        $pdo = self::getDb();
        if (self::findByUserId(['id' => $data['id_user']])) {
            $request = "UPDATE default_forum SET id_forum = :id_forum WHERE id_user = :id_user";
        } else {
            $request = "INSERT INTO default_forum (id_user, id_forum) VALUE (:id_user, :id_forum)";
        }
        $response = $pdo->prepare($request);
        try {
            $response->execute(self::htmlspecialchars($data));
        } catch (Exception $e) {
            throw $e;
        }

        return $pdo->lastInsertId(); // TODO: This or just return responses?
    }

    /**
     * Find the default forum corresponding to the the user
     * 
     * @param array $id
     * @return mixed the row (associative array) corresponding to the requested 
     * default forum or FALSE if nothing is found.
     */
    public static function findByUserId(array $id): mixed
    {
        $request = "SELECT default_forum.*, forum.name, forum.url_name FROM default_forum INNER JOIN forum ON default_forum.id_forum = forum.id WHERE default_forum.id_user = :id";
        $response = self::getDb()->prepare($request);
        try {
            $response->execute(self::htmlspecialchars($id));
        } catch (Exception $e) {
            throw $e;
        }

        return $response->fetch(PDO::FETCH_ASSOC);
    }
}
