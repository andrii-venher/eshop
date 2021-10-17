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

function renderView($fileName, $data = []) {
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
    if (array_keys($_SESSION, 'success_message')) {
        return true;
    }
    return false;
}

function getJsonArray($fileName) {
    if(file_exists($fileName)) {
        $output = json_decode(file_get_contents($fileName), true);
        return $output ?? [];
    }
    return [];
}

function pushToJsonArray($fileName, $content) {
    $array = getJsonArray($fileName);
    $array[] = $content;
    file_put_contents($fileName, json_encode($array));
}

function dump(...$args)
{
    echo '<pre>' . var_export($args, true) . '</pre>';
}
