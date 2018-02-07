<?php

class ProductController {

    public function actionView($category, $id) {
        $product = array();
        $product = Product::getProductById($category, $id);

        if(empty($product)) {
            Page404Controller::actionIndex();
        } else {
            echo ($product[0]['name']);
        }
    }
}