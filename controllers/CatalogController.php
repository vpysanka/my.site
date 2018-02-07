<?php

class CatalogController {

    public function actionCategory($category, $page = 1) {
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryName = array();
        $categoryName = Category::getCategoryName($category);

        if(empty($categoryName)) {
            Page404Controller::actionIndex();
        } else {
            $title = $categoryName . ' ~ My E-shop';
            $catalogName = $categoryName;
            $category_id = $category;
            $count = 6;
            
            $total = Product::getTotalProductsInCategory($category_id);

            $totalPages = ceil($total / $count);
            
            if ($page > $totalPages) {
                $page = 1;
                header("Location: /catalog/" . $category);
            }

            $allProducts = array();
            $allProducts = Product::getAllProductsInCategory($category_id, $page, $count);

            $pagination = new Pagination($total, $page, $count, 'page=');
    
            require_once VIEWS.'catalog.php';
        }
    }
}