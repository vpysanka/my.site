<?php

class Order {

    public static function save($userId, $products) {
        $db = Db::getConnection();

        $productsInCart = json_encode($productsInCart);

        $sql = "INSERT INTO orders (userId, products) VALUES (:userId, :products)";

        $res = $db->prepare($sql);

        $res->bindParam(':userId', $userId, PDO::PARAM_INT);
        $res->bindParam(':products', $productsInCart, PDO::PARAM_STR);

        return $res->execute();
    }
}