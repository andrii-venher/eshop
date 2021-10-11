<?php
include_once __DIR__ . '/core/bootstrap.php';

$errors = [];

if(empty($_POST['name'])) {
    $errors[] = 'Name is required.';
} else if(strlen($_POST['name']) < 3 || strlen($_POST['name']) > 10) {
    $errors[] = 'Name must be 3 to 10 chars';
} else if(strlen($_POST['articul']) < 3 || strlen($_POST['articul']) > 20) {
    $errors[] = 'Articul must be 3 to 20 chars';
} else if(strlen($_POST['description']) > 200) {
    $errors[] = 'Description must be up to 200 chars';
}

if($errors) {
    render_view('product_form', ['errors' => $errors]);
} else {
    setSuccessMessage('Product created.');
    addProduct($_POST['name'], $_POST['articul'], $_POST['categoryId'], $_POST['description']);
    redirect('product_table.php');
}