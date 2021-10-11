<?php
include_once __DIR__ . '/core/bootstrap.php';
echo '<pre>';
foreach(getCategoriesTree() as $root) {
    var_dump(getChildren($root, 3));
}
echo '</pre>';
//var_dump(array_map(function($category) { return $category['id']; }, getParents(getCategories(), 5)));
//flattenToObjects(getChildren(getCategoriesTree(), 1));
//var_dump(flattenToObjects(getChildren(getCategoriesTree(), (int) $_GET['categoryId'])));
//var_dump(array_map(function($category) { return $category['id']; }, flattenToObjects(getChildren(getCategoriesTree(), (int) $_GET['categoryId']))));
