<?php

class Page404Controller {

    public static function actionIndex() {
        $title = 'Ой - My E-shop';
        require_once VIEWS.'/404.php';
    }
}