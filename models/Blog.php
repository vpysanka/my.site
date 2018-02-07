<?php

class Blog {

    public static function getBlogItemById($id) {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM posts WHERE id = '.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $blogItem = $result->fetch();
            return $blogItem;
        }
    }

    public static function getBlogList() {
        $db = Db::getConnection();

        $blogList = array();

        $result = $db->query('SELECT id, title, date, short_content, preview'
                .' FROM posts'
                .' ORDER BY id'
                .' DESC LIMIT 10');

        foreach($result as $row){
            $blogList[] = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'date' => $row['date'],
                'short_content' => $row['short_content'],
                'preview' => $row['preview']
            );
        }
        
        return $blogList;
    }
}