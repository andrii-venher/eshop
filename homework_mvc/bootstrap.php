<?php
session_start();
include_once __DIR__ . '/core/functions.php';
include_once __DIR__ . '/core/RouterList.php';
include_once __DIR__ . '/routers.php';
include_once __DIR__ . '/controllers/HomeController.php';
include_once __DIR__ . '/controllers/LoginController.php';
include_once __DIR__ . '/controllers/ProductsController.php';
include_once __DIR__ . '/models/Model.php';
include_once __DIR__ . '/models/ProductModel.php';