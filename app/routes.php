<?php
// app/routes.php
$router->add('/', 'HomeController@index');
$router->add('/about', 'HomeController@about');
$router->add('/articles', 'ArticleController@index');
$router->add('/articles/{slug}', 'ArticleController@show');
