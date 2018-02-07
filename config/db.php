<?php
/**
 * Данные для подключения к БД
 */

return array(
        'connection' => 'pgsql:host=localhost',
        'port' => 'port=5432',
        'dbname' => 'dbname=myshop',
        'user' => 'user=valerii',
        'password' => 'password=password',
        'options' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);