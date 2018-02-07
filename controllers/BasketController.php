<?php

class BasketController {

    public function actionIndex() {
        if ((Session::get('logged'))) {
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
        }

        $title = 'Корзина - My E-Shop';
        
        $categories = array();
        $categories = Category::getCategoriesList();

        require_once VIEWS.'basket.php';
    }

    public function actionAddToCart() {
        $userId = session_id();

        $productsInCart = $_POST['value'];

        // $res = Order::save($userId, $productsInCart);

        echo true;
    }

    public function actionMybasket() {
        
        // $.ajax({
        //     type: 'POST',
        //     dataType: 'json',
        //     url: 'mybasket',
        //     data: {'localStorage': JSON.stringify(cart)},
        //     success: function(date) {
        //         cart = date;
        //     }
        // });

        if (isset($_POST['localStorage'])) {
            $localStorage = $_POST['localStorage'];

            echo json_encode($localStorage);
        } else {
            header("Location: page404");
        }
    }
}