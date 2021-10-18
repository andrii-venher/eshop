<?php

namespace App\Controllers;

use DateTime;
use App\Models\ProductModel;

class ProductsController {

    public function index() {
        $product = new ProductModel();
        return renderView('products_table', ['products' => $product->all()]);
    }

    public function show() {
        return renderView('products_form');
    }

    public function create() {
        $errors = [];
        $product = new ProductModel;
        $product->name = $_POST['name'];
        $product->articul = $_POST['articul'];
        $image = null;
        if(!empty($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
            if($_FILES['image']['size'] > 100 * 1024) {
                $errors[] = 'Image exceeded size limit of 100 KB.';
            }
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            if($extension != 'png' && $extension != 'jpg') {
                $errors[] = 'Unsupported image extension (.png, .jpg are supported).';
            }

            if(count($errors)) {
                renderView('products_form', ['errors' => $errors]);
                return;
            }
            $fileName = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
            $timestamp = (new DateTime())->getTimestamp();
            $image = "{$fileName}_{$timestamp}.{$extension}";
            $uploadDir = __DIR__ . '/../storage/';
            $filePath = $uploadDir . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], $filePath);
        }
        $product->image = $image;
        $product->save();
    
        redirect('/products');
    }   

    public function delete() {
        header('Content-Type: application/json');
        $product = new ProductModel();
        $id = -1;
        if(empty($_POST)) { 
            $_POST = json_decode(file_get_contents('php://input', true), true); 
        }
        if(!empty($_POST['id']) && $_POST['id'] > 0) {
            $id = $_POST['id'];
        }

        $ids = array_map(function ($p) {
            return $p->id;
        }, $product->all());

        if(in_array($id, $ids)) {
            $product->id = $id;
            $product->delete();
            echo json_encode([
                'status' => 204
            ]);
        }
        else {
            echo json_encode([
                'status' => 404
            ]);
        }
    }

    public function table() {
        $product = new ProductModel();
        return renderView('products_table_raw', ['products' => $product->all()]);
    }     

    public function showDelete() {
        $product = new ProductModel;
        renderView('product_delete', ['products' => $product->all()]);
    }
}