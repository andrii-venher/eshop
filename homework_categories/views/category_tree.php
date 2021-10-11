<?php
function renderTree($tree) {
    echo '<ul class="without-bullets">';
    echo "<li><a class='button-link' href='?categoryId={$tree['id']}'>{$tree['name']}</a></li>";
    if($tree['children']) {
        foreach($tree['children'] as $child) {
            renderTree($child);
        }
    }
    echo '</ul>';
}

$categoriesTree = getCategoriesTree();
if(!$categoriesTree) {
    echo '<h5 class="text-center text-muted">No categories</h5>';
}
else {
    $output = '';
    ob_start();
    foreach($categoriesTree as $root) {
        renderTree($root);
    }
    $output = ob_get_contents();
    ob_clean();
    echo $output;
}
