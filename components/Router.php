<?php

class Router {
     
    private $routes;
    
    public function __construct() {
      $this->routes = include_once 'config/routes.php'; 
    }
    
    private function getURI() {
        if(!empty($_SERVER['REQUEST_URI'])){
        return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


    public function run() {
        // Получить строку запроса
        $uri = $this->getURI();
        echo $uri;        
        //Проверить наличие такого запроса в routes.php
        
        // Есть ли совпадение, определить какой контроллер 
        // и action обрабатывает запрос
        
        // Подключить файл класса контроллера
        
        // Создать объект, вызвать метод (т.е. action)
    }
}
 