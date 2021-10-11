<?php
RouterList::addRouter([
    'url_path' => '/home',
    'handler' => 'HomeController@index',
    'method' => 'GET'
]);
RouterList::addRouter([
    'url_path' => '/',
    'handler' => 'HomeController@index',
    'method' => 'GET'
]);
RouterList::addRouter([
    'url_path' => '/login',
    'handler' => 'LoginController@index',
    'method' => 'GET'
]);
RouterList::addRouter([
    'url_path' => '/products',
    'handler' => 'ProductsController@index',
    'method' => 'GET'
]);
RouterList::addRouter([
    'url_path' => '/products',
    'handler' => 'ProductsController@create',
    'method' => 'POST'
]);
RouterList::addRouter([
    'url_path' => '/products/show',
    'handler' => 'ProductsController@show',
    'method' => 'GET'
]);
RouterList::addRouter([
    'url_path' => '/products/delete',
    'handler' => 'ProductsController@showDelete',
    'method' => 'GET'
]);
RouterList::addRouter([
    'url_path' => '/products/delete',
    'handler' => 'ProductsController@delete',
    'method' => 'POST'
]);