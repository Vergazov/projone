<?php

class News {
    
    //Возвращает одну новость с параметром id
    
    public static function getNewsItemById($id) {
       
       $id = intval($id); 
       
       if($id) {       
       
       $pdo = Db::getConnection();
                      
       $result = $pdo->query('SELECT * FROM publications WHERE id =' . $id);
       
       $newsItem = $result->fetch(PDO::FETCH_ASSOC);
       return $newsItem;
       }
    }
    
    // Возврашает список новостей в виде массива
    
    public static function getNewsList() {
       
       $pdo = Db::getConnection();
       
       $newsList = array();
       
       $result = $pdo->query('SELECT * from publications ORDER BY  date DESC LIMIT 10 ');
       $i = 0;
       while($row = $result->fetch(PDO::FETCH_OBJ)){
           $newsList[$i]['id'] = $row->id;
           $newsList[$i]['title'] = $row->title;
           $newsList[$i]['date'] = $row->date;
           $newsList[$i]['short_content'] = $row->date;
           $newsList[$i]['content'] = $row->content;
           $newsList[$i]['author_name'] = $row->author_name;
           $newsList[$i]['preview'] = $row->preview;
           $newsList[$i]['type'] = $row->type;
           $i++;
       }
       return $newsList;
       
       
       
       
       
        
        
    }
}