<?php

//FRONT CONTROLLER

// 1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы
define('ROOT', __DIR__);
include_once 'components/Router.php';
include_once 'components/DB.php';

// 4. Вызов Router
$router = new Router;
$router->run();
