<?php

use App\Models\ProductModel;

include_once __DIR__ . '/bootstrap.php';

$model = new ProductModel();
$model->name = 'new product';
$model->image = 'new.png';
$model->description = 'description of the new product';
$model->category_id = 2;
$model->save();

dump($model->all());