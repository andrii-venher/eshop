<?php
include_once __DIR__ . '/functions.php';

function addCategory($name, $parentId = 0) {
    $categories = getJsonArray('db/categories.dat');
    $id = count($categories) + 1;
    pushToJsonArray('db/categories.dat', [
        'id' => $id,
        'name' => $name,
        'parentId' => (int) $parentId
    ]);
}

function addProduct($name, $articul, $categoryId, $description) {
    pushToJsonArray('db/products.dat', [
        'name' => strip_tags($name),
        'articul' => strip_tags($articul),
        'categoryId' => (int) $categoryId,
        'description' => strip_tags($description)
    ]);
}   

function getSubcategories($categoryId) {
    foreach(getCategoriesTree() as $rootCategory) {
        $res = getChildren($rootCategory, $categoryId);
        if(!is_null($res)) {
            return $res;
        }
    }
    return [];
}

function getCategoriesTree() {
    return buildTreeFromArray(getJsonArray('db/categories.dat'));
}

function getCategories() {
    return getJsonArray('db/categories.dat');
}

function getCategoryName($id) {
    $categories = getCategories();
    return $categories[array_search($id, array_column($categories, 'id'))]['name'];
}
