<?php

class Basket {
    public static function addProduct($id) {
        $id = intval($id);
        $productsInBasket = array();

        if (isset($_SESSION['products'])) {
            $productsInBasket = $_SESSION['products'];
        }

        if (array_key_exists($id, $productsInBasket)) {
            $productsInBasket[$id] ++;
        } else {
            $productsInBasket[$id] = 1;
        }

        $_SESSION['products'] = $productsInBasket;

        return self::countItems();
    }

    public static function countItems() {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count += $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }
}