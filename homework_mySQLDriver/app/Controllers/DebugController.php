<?php

namespace App\Controllers;

use App\Models\ProductModel;

class DebugController {
    public function index() {
        $p = new ProductModel();
        $p->name = 'name1';
        $p->articul = 'articul';
        $p->save();
    }
}