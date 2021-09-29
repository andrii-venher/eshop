<?php include_once __DIR__ . "/header.php" ?>
<div class="container">
    <div class="row">
    <div class="col-sm-2">
        <h3 class="text-center margin-10">Categories</h3>
        <?php include_once __DIR__ . '/category_tree.php' ?>
    </div>
    <div class="col-sm">
        <h3 class="text-center margin-10">Products</h3>
        <div class="row">
            <?php 
            $products = getJsonArray('db/products.dat');
            if($_GET['categoryId']) {
                $new = [];
                foreach($products as $product) {
                    if($product['categoryId'] == (int) $_GET['categoryId'] ||
                        in_array($product['categoryId'], array_map(function($category) { return $category['id']; }, flattenToObjects(getSubcategories((int) $_GET['categoryId']))))) {
                        $new[] = $product;
                    }
                }
                $products = $new;
            }
            if($products) {
                foreach($products as $product) { ?>
                    <div class="col-4">
                        <div class="card margin-10" style="width: 18rem;">
                            <img src="/img/bitcoin.png" class="card-img-top" alt="Bitcoin">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <h4 class="card-title "><?= $product['name'] ?? "Name"  ?></h4>
                                <h5 class="card-subtitle mb-2 text-muted"><?= getCategoryName($product['categoryId']) ?? "Category" ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $product['articul'] ?? "Articul" ?></h6>
                                <p class="card-text"><?= $product['description'] ?? "Description" ?></p>
                            </div>
                        </div>
                    </div>
                <?php } 
            } else { ?>
                <h5 class="text-center text-muted">No products</h5>
            <?php } ?>
        </div>
    </div>
    </div>
</div>
<?php include_once __DIR__ . "/footer.php" ?>