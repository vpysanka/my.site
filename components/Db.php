<?php

class Db {

    public static function getConnection() {
        $paramsPath = CONFIG.'db.php';
        $params = include($paramsPath);

        $db = new PDO("{$params['connection']};{$params['port']};{$params['dbname']};
                       {$params['user']};{$params['password']}");

        return $db;
    }
}