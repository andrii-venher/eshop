<?php include_once __DIR__ . "/header.php" ?>
<div class="container">
    <?php 
    $products = getJsonArray('db/products.dat');
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Articul</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php if($products) {
              foreach($products as $product) { ?>
                <tr>
                    <th scope="row"><?= $product['name'] ?></th>
                    <td><?= $product['articul'] ?></td>
                    <td><?php echo strlen($product['description']) > 10 ? mb_substr($product['description'], 0, 10).'...' : $product['description'] ?></td>
                </tr>
              <?php } ?>
            <?php } else { ?>
              <tr>
                  <td colspan="3">No data</td>
              </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include_once __DIR__ . "/footer.php" ?>