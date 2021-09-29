<?php
include_once __DIR__ . '/core/bootstrap.php';

$errors = [];

if(empty($_POST['name'])) {
    $errors[] = 'Name is required.';
} else if(strlen($_POST['name']) < 3 || strlen($_POST['name']) > 20) {
    $errors[] = 'Name must be 3 to 20 chars';
}

if($errors) {
    render_view('category_form', ['errors' => $errors]);
} else {
    setSuccessMessage('Category created.');
    $parentId = empty($_POST['parentId']) ? 0 : $_POST['parentId'];
    addCategory(strip_tags($_POST['name']), $parentId);
    redirect('category_table.php');
}