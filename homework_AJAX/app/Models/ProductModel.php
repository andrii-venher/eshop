<?php

namespace App\Models;

class ProductModel extends Model {
    protected static $table = 'products';
    protected $fillable = ['id', 'name', 'image', 'description', 'category_id'];
}