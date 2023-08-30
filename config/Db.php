<?php

class Db {

    protected static function getDb() {
        try {
            $bdd = new PDO('mysql:host=' . CONFIG['db']['DB_HOST'] . ';dbname=' . CONFIG['db']['DB_NAME'] . ';charset=utf8;port=' . CONFIG['db']['DB_PORT'],
                            CONFIG['db']['DB_USER'],
                            CONFIG['db']['DB_PSWD'],
                            [
                                'ATTR_ERRMODE' => PDO::ERRMODE_EXCEPTION,
            ]);
            return $bdd;
        } catch (Exception $e) {
            var_dump($e);
            die;
        }
    }
}