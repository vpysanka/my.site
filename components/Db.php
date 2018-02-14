<?php

class Db {

    public static function getConnection() {
        $paramsPath = CONFIG.'db.php';
        $params = include($paramsPath);

        $db = new PDO("pgsql:host={$params['connection']}; port={$params['port']}; dbname={$params['dbname']};
                       user={$params['user']}; password={$params['password']}");

        return $db;
    }
}