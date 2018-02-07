<?php

class Product {

    const SHOW_BY_DEFAULT = 9;

    public static function getWeekOfferProducts() {
        $db = Db::getConnection();
        $productsList = array();

        $result = $db->query('SELECT name, category_id, code, price, action_price, image, s_display, 
                            s_processor, s_camera, s_memory, s_battery, s_weight
                            FROM products WHERE status is true AND is_week_offer is true
                            ORDER BY id DESC');
        
        foreach ($result as $row) {
            $productsList[] = array(
                'name' => $row['name'],
                'category' => $row['category_id'],
                'code' => $row['code'],
                'price' => $row['price'],
                'new_price' => $row['action_price'],
                'image' => $row['image'],
                'display' => $row['s_display'],
                'processor' => $row['s_processor'],
                'camera' => $row['s_camera'],
                'memory' => $row['s_memory'],
                'battery' => $row['s_battery'],
                'weight' => $row['s_weight']
            );
        }

        return $productsList;
    }

    public static function getSaleLeadersProducts($count = self::SHOW_BY_DEFAULT) {
        $count = intval($count);
        $db = Db::getConnection();
        $productsList = array();

        $result = $db->query('SELECT name, category_id, code, price, action_price, image, s_display, 
                            s_processor, s_camera, s_memory, s_battery, s_weight, is_action
                            FROM products WHERE status is true AND is_sale_leader is true 
                            ORDER BY id DESC LIMIT ' . $count);
        
        foreach($result as $row) {
            $productsList[] = array(
                'name' => $row['name'],
                'category' => $row['category_id'],
                'code' => $row['code'],
                'price' => $row['price'],
                'new_price' => $row['action_price'],
                'image' => $row['image'],
                'display' => $row['s_display'],
                'processor' => $row['s_processor'],
                'camera' => $row['s_camera'],
                'memory' => $row['s_memory'],
                'battery' => $row['s_battery'],
                'weight' => $row['s_weight'],
                'action' => $row['is_action']
            );
        }

        return $productsList;
    }

    public static function getAllProductsInCategory($category_id, $page = 1, $count = self::SHOW_BY_DEFAULT) {
        $page = intval($page);
        $offset = ($page - 1) * $count;
        
        $db = Db::getConnection();
        $productsList = array();
                
        $result = $db->query("SELECT name, category_id, code, price, action_price, image, 
                            s_display, s_processor, s_camera, s_memory, s_battery, s_weight
                            FROM products WHERE status is true AND category_id = '$category_id'
                            ORDER BY id DESC LIMIT " . $count . "OFFSET " . $offset);
        
        foreach ($result as $row) {
            $productsList[] = array(
                'name' => $row['name'],
                'category' => $row['category_id'],
                'code' => $row['code'],
                'price' => $row['price'],
                'new_price' => $row['action_price'],
                'image' => $row['image'],
                'display' => $row['s_display'],
                'processor' => $row['s_processor'],
                'camera' => $row['s_camera'],
                'memory' => $row['s_memory'],
                'battery' => $row['s_battery'],
                'weight' => $row['s_weight']
            );
        }

        return $productsList;
    }

    public static function getProductById($category, $id) {
        $db = Db::getConnection();
        $productsList = array();
        
        $result = $db->query("SELECT name, code, price, action_price, image, 
                            s_display, s_processor, s_camera, s_memory, s_battery, s_weight
                            FROM products WHERE status is true AND category_id = '$category' AND code = '$id'
                            ORDER BY id DESC");
        
        foreach ($result as $row) {
            $productsList[] = array(
                'name' => $row['name'],
                'code' => $row['code'],
                'price' => $row['price'],
                'new_price' => $row['action_price'],
                'image' => $row['image'],
                'display' => $row['s_display'],
                'processor' => $row['s_processor'],
                'camera' => $row['s_camera'],
                'memory' => $row['s_memory'],
                'battery' => $row['s_battery'],
                'weight' => $row['s_weight']
            );
        }

        return $productsList;
    }

    public static function getTotalProductsInCategory($category) {
        $db = Db::getConnection();

        $result = $db->query("SELECT count(id) AS count FROM products WHERE status is true
                            AND category_id = '$category'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $row = $result->fetch();

        return $row['count'];
    }
}