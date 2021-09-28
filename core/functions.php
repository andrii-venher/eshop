<?php

function view($fileName, $data = []) {
    $output = '';
    ob_start();
    extract($data);
    include $_SERVER['DOCUMENT_ROOT'] . "/views/{$fileName}.php";
    $output = ob_get_contents();
    ob_clean();
    return $output;
}

function render_view($fileName, $data = []) {
    echo view($fileName, $data);
}

function old($name) {
    return $_REQUEST[$name] ?? null;
}

function redirect($to) {
    header("Location: $to");
}

function setSuccessMessage($message) {
    $_SESSION['success_message'] = $message;
}

function getSuccessMessage() {
    $output = $_SESSION['success_message'] ?? null;
    unset($_SESSION['success_message']);
    return $output;
}

function hasSuccessMessage() {
    return (bool)$_SESSION['success_message'] ?? false;
}

function getJsonArray($fileName) {
    if(file_exists($fileName)) {
        return json_decode(file_get_contents($fileName), true);
    }
    return [];
}

function pushToJsonArray($fileName, $content) {
    $array = getJsonArray($fileName);
    $array[] = $content;
    file_put_contents($fileName, json_encode($array));
}