<?php

class Db {
    
    public static function getConnection() {
        
      $paramsPath = ROOT . '/config/db_params.php';
      $params = include_once($paramsPath);
      
      $dsn = "mysql:host=localhost;dbname={$params['db_name']}";
      $pdo = new PDO($dsn,$params['db_user'],$params['db_pass']);
      
      return $pdo;
    } 
}

