<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-04 13:29:33 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-07 23:30:43
 * @Description: Db is a class enabling connection with the database. It may be used in model classes.
 */

class Db
{
    /**
     * Instanciate a PDO object connected to the database.
     *
     * @return PDO Returns a PDO object connected to the database.
     */
    protected static function getDb(): PDO
    {
        try {
            $bdd = new PDO(
                'mysql:host=' . CONFIG['db']['DB_HOST'] . ';dbname=' . CONFIG['db']['DB_NAME'] . ';charset=utf8;port=' . CONFIG['db']['DB_PORT'],
                CONFIG['db']['DB_USER'],
                CONFIG['db']['DB_PSWD'],
                [
                    'ATTR_ERRMODE' => PDO::ERRMODE_EXCEPTION,
                ]
            );
            return $bdd;
        } catch (Exception $e) {
            // TODO : remove the vardump and die, replace it by an error 404 for example
            var_dump($e);
            die;
        }
    }

    /**
     * Neutralize CSS and XSS attacks of an array of data.
     * 
     * @return array Returns the array of data processed.
     */
    protected static function htmlspecialchars(array $data): array
    {
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars($value);
            //* we transform the chevrons into an html entity that neutralizes the script or style tags that may be injected
            //* we talk about neutralizing css and xss vulnerabilities
        }

        return $data;
    }
}
