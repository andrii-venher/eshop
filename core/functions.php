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

function flatten(array $array) {
    $output = array();
    array_walk_recursive($array, function($a) use (&$output) { $output[] = $a; });
    return $output;
}

function flattenToObjects(array $array) {
    if(count($array) == 0) {
        return [];
    }
    $keys = array_filter(array_keys($array[0]), function($key) { return $key != 'children'; });
    $flat = flatten($array);
    $output = [];
    for($i = 0; $i < count($flat); $i += count($keys)) {
        $temp = [];
        for($j = 0; $j < count($keys); $j++) {
            $temp[$keys[$j]] = $flat[$i + $j];
        }
        $output[] = $temp;
    }
    return $output;
}

function buildTreeFromArray($items) {
    if(empty($items)) {
        return [];
    }
    $children = [];
    foreach ($items as &$item) {
        $children[$item['parentId']][] = &$item;
    }
    unset($item);
    foreach ($items as &$item) {
        if (isset($children[$item['id']])) {
            $item['children'] = $children[$item['id']];
        }
    }
    
    return $children[0];
}

function getChildren($tree, $id) {
    if(is_null($tree)) {
        return null;
    }
    else {
        if($tree['id'] == $id) {
            return $tree['children'];
        }
        else {
            if(!$tree['children']) {
                return null;
            }
            foreach($tree['children'] as $child) {
                $search = getChildren($child, $id);
                if(!is_null($search)) {
                    return $search;
                }
            }
        }
    }
}

function getParentsAndPushBack($array, $id){
    $output = array();
    foreach ($array as $element){
        if ($element['id'] == $id){
            $output = getParentsAndPushBack($array, $element['parentId']);
            $output[] = $element;
        }
    }
    return $output;
}

function getParents($array, $id) {
    $output = getParentsAndPushBack($array, $id);
    return array_slice($output, 0, count($output) - 1);
}