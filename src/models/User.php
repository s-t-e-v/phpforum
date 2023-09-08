<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-07 22:47:26 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-08 00:24:51
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
        if ($data['picture_profil'])
            $request = "INSERT INTO user (email, password, nickname, picture_profil) VALUES (:email, :password, :nickname, :picture_profil)";
        else
            $request = "INSERT INTO user (email, password, nickname) VALUES (:email, :password, :nickname)";
        $response = $pdo->prepare($request);
        $response->execute(self::htmlspecialchars($data));

        return $pdo->lastInsertId();
    }

    /**
     * Find the user corresponding to the email.
     * 
     * @param array $email
     * @return mixed the row (associative array) corresponding to the requested user or 
     * FALSE if nothing is found.
     */
    public static function findByEmail(array $email): mixed
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
     * @return mixed the row (associative array) corresponding to the requested user or 
     * FALSE if nothing is found.
     */
    public static function findByNickname(array $nickname): mixed
    {
        $request = "SELECT * FROM user WHERE nickname=:nickname";
        $response = self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($nickname));

        return $response->fetch(PDO::FETCH_ASSOC);
    }
}
