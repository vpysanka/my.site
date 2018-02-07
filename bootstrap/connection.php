<?php

try {
    $connection = new PDO("pgsql:host=localhost;port=5432;dbname=myshop; user=valerii; password=password");
} catch (Exception $e) {
    die("Не удалось подключиться: ".$e->getMessage());
}