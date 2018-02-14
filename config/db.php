<?php
/**
 * Данные для подключения к БД
 */

if ($_SERVER['SERVER_NAME'] == "ec2-54-221-234-62.compute-1.amazonaws.com") {
        return array(
                'connection' => 'ec2-54-221-234-62.compute-1.amazonaws.com',
                'port' => '5432',
                'dbname' => 'd1dbuh400jo68l',
                'user' => 'lrbadyygelioag',
                'password' => '299386d6d1e7abdec3c22d0d5230dfdd6d280e5892fa1acd6b177b4c5563b26a',
                'options' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
} else {
        return array(
                'connection' => 'localhost',
                'port' => '5432',
                'dbname' => 'myshop',
                'user' => 'valerii',
                'password' => 'password',
                'options' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
}