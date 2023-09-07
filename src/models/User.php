<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-07 22:47:26 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-07 23:33:35
 * @Description: User database management
 */

class User extends Db
{
    /**
     * Add the new user to the database
     * 
     * @param array $data
     * @return string last insert id message
     */
    public static function add(array $data): string
    {
        $pdo = self::getDb();
        $request = "INSERT INTO user (email, password, nickname, picture_profil) VALUES (:email, :password, :nickname, :picture_profil)";
        $response = $pdo->prepare($request);
        $response->execute(self::htmlspecialchars($data));

        return $pdo->lastInsertId();
    }

    /**
     * Find the user corresponding to the email
     * 
     * @param array $email
     * @return array the row corresponding to the requested user
     */
    public static function findByEmail(array $email): array
    {
        $request = "SELECT * FROM user WHERE email=:email";
        $response = self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($email));

        return $response->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Find the user corresponding to the nickname
     * 
     * @param array $nickname
     * @return array the row corresponding to the requested user
     */
    public static function findByNickname(array $nickname): array
    {
        $request = "SELECT * FROM user WHERE nickname=:nickname";
        $response = self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($nickname));

        return $response->fetch(PDO::FETCH_ASSOC);
    }
}
