<?php include_once __DIR__ . "/header.php" ?>
<div class="container">
    <?php 
    $products = getJsonArray('db/products.dat');
    ?>
    <div class="row">
        <?php foreach($products as $product) { ?>
        <div class="col-3">
            <div class="card margin-10" style="width: 18rem;">
                <img src="/img/bitcoin.png" class="card-img-top" alt="Bitcoin">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title "><?= $product['name'] ?? "Name"  ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $product['articul'] ?? "Articul" ?></h6>
                    <p class="card-text"><?= $product['description'] ?? "Description" ?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include_once __DIR__ . "/footer.php" ?>