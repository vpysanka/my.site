<?php

class Category {

    public static function getCategoriesList() {
        $db = Db::getConnection();
        $categoryList = array();

        $result = $db->query('SELECT id, name, select_product, image, category_id 
                            FROM category WHERE status is true ORDER BY sort_order ASC');

        foreach($result as $row) {
            $categoryList[] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'select' => $row['select_product'],
                'category' => $row['category_id'],
                'image' => $row['image']
            );
        }

        return $categoryList;
    }

    public static function getCategoryName($category) {
        $db = Db::getConnection();
        
        $result = $db->query("SELECT name FROM category WHERE category_id = '$category'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $row = $result->fetch();
              
        return $row['name'];
    }
}