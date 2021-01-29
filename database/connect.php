<?php

class DataBase {
    public static function connect()
    {
        $host = 'localhost';
        $user = 'nadea';
        $password = '1';
        $dbname = 'schedule_db';

        try {
            //set DSN (data source name)
            $dsn = 'mysql:host='. $host . ';dbname='. $dbname . ';charset=UTF8';

            //create a PDO instance
            $connect = new PDO($dsn, $user, $password);
            $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connect;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }

    }

}