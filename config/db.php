<?php
/**
 * Данные для подключения к БД
 */

if ($_SERVER['SERVER_NAME'] == "ec2-54-235-64-195.compute-1.amazonaws.com") {
        return array(
                'connection' => 'ec2-54-235-64-195.compute-1.amazonaws.com',
                'port' => '5432',
                'dbname' => 'd8l01i9od33l4l',
                'user' => 'kereitbhlcnuyj',
                'password' => '0b58557d3b71fb376bd2ed954678a2ff86390d9813f8819c7c41ca797ebe65c2',
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