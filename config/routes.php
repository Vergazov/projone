<?php

//Операция возвращает массив. Что позволяет нам поместить этот массив в переменную и использовать в дальнейшем

return array(
    
    'projone/news/([0-9]+)' => 'news/view/$1',  //ActionView в NewsController + параметры $1 и $2
 
//  'projone/news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',  //ActionView в NewsController + параметры $1 и $2
    
    'projone/news' => 'news/index' , //ActionIndex в NewsController
    
    'projone/product' => 'product/list' // ActionList в ProductController
    
    
);


    
