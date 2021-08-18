<?php

class Router {
     
    private $routes;
    
    public function __construct() {
      $this->routes = include_once 'config/routes.php'; 
    }      
    
    /*
        Return request string
    */
    private function getURI() {
        if(!empty($_SERVER['REQUEST_URI'])){
        return trim($_SERVER['REQUEST_URI'], '/');
        }
    }   


    public function run() {
        // Получить строку запроса
        $uri = $this->getURI();  
        
        //Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern=> $path) {
            
            // Сравниваем $uriPattern(данные из файла routes.php) и $uri(строка запроса пользователя)
        
            if(preg_match("~$uriPattern~", $uri)){
                
                    // Определить какой контроллер 
                    // и action обрабатывает запрос
                
                $segments = explode("/", $path);
                
                $controllerName = ucfirst(array_shift($segments)). 'Controller';              
                $actionName = 'action' . ucfirst(array_shift($segments));               
                
            }
        }    
        
        // Подключить файл класса контроллера
        
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                
                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }
                
        
        // Создать объект, вызвать метод (т.е. action)
         $controllerObject = new $controllerName; 
         $result = $controllerObject->$actionName();
         echo $result;
         if($result !=null) {
             exit();
         }
    }
}
 