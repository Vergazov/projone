<?php

class Router {
    
    private $routes; // Переменная для хранения путей
    
    public function __construct() {
       
        $this->routes = include_once 'config/routes.php'; // Подключаем файл с путями и помещаем его в переменную.
    }
    
    //Этим методом мы получаем строку запроса
    
    private function getUri() { 
        if(!empty($_SERVER['REQUEST_URI'])){
           return trim($_SERVER['REQUEST_URI'],'/');           
        }
    }
        
    public function run() {               
   
        // Получить строку запроса
        
        $uri = $this->getUri();
        
        // Проверить наличие такого запроса в routes.php
        
        foreach ($this->routes as $key => $value) { // Получааем доступ к элементам массива в файле routes.php
         
             // Если есть совпадение, определить какой контроллер и action обрабатывает запрос
            
            if(preg_match("~$key~", $uri)){   // Проверяем, содержиться ли в шаблоне $key(взятому из routes.php) строка $uri(пользовательский ввод)          
             
             $segments = (explode('/', $value)); 
             $controller = ucfirst(array_shift($segments)) . 'Controller';
             $action = 'Action' . ucfirst(array_shift($segments));           
            
        
        // Подключить файл класса-контроллера
        
        $controllerFile = ROOT . '/controllers/' . $controller . '.php';
        if(file_exists($controllerFile)){
            include_once($controllerFile);
        }       
        
        // Создать объект, выхвать метод(т.е action)
        $controllerObject = new $controller;
        $result = $controllerObject->$action();
        if($result != null){
            die();
        }
        }
      }
    }
}