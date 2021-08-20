<?php

class NewsController {
    
    public function ActionIndex() {
   
        echo 'Просмотр новостей';
        return true;
    }
    
    public function ActionView($category,$id) {
        echo $category, '<br>';
        echo $id;
        return true;
    }
}



