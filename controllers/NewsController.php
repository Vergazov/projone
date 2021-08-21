<?php
include_once ROOT . '/models/News.php';

class NewsController {
    
    public function ActionIndex() {
   
        $newsList = array();
        $newsList = News::getNewsList();
        
        require_once(ROOT . '/views/news/index.php');
        
        return true;
    }
    
    public function ActionView($id) {
        
               
        $newsItem = News::getNewsItemById($id);
        
        echo '<pre>';
        print_r($newsItem);
        
        return true;
    }
}



