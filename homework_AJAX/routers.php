<?php

use App\Core\RouterList;

RouterList::addRouter([
    'url_path' => '/',
    'handler' => 'HomeController@index',
    'method' => 'GET'
]);
RouterList::addRouter([
    'url_path' => '/home',
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
RouterList::addRouter([
    'url_path' => '/products/table',
    'handler' => 'ProductsController@table',
    'method' => 'GET'
]);
RouterList::addRouter([
    'url_path' => '/fileManager',
    'handler' => 'FileManagerController@index',
    'method' => 'GET'
]);
RouterList::addRouter([
    'url_path' => '/fileManager',
    'handler' => 'FileManagerController@create',
    'method' => 'POST'
]);
RouterList::addRouter([
    'url_path' => '/fileManager/delete',
    'handler' => 'FileManagerController@delete',
    'method' => 'POST'
]);
RouterList::addRouter([
    'url_path' => '/fileManager/update',
    'handler' => 'FileManagerController@update',
    'method' => 'POST'
]);
RouterList::addRouter([
    'url_path' => '/debug',
    'handler' => 'DebugController@index',
    'method' => 'GET'
]);
RouterList::addRouter([
    'url_path' => '/error',
    'handler' => 'ErrorController@index',
    'method' => 'GET'
]);