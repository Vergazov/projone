<?php

//FRONT CONTROLLER

// Format: dd-mm-yyyy;
$string = '18-08-2021';

// Год 2021, месяц август, день 18

$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';

$replacement = 'Год $3, месяц $2, день $1';

echo preg_replace($pattern, $replacement, $string);
// 1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы 
define('ROOT', dirname(__FILE__));
include_once 'components/Router.php';

// 3. Установка соединения с БД

// 4. Вызов Router
$router = new Router;
$router->run();
