<?php include_once __DIR__ . '/header.php' ?>
<div class="container" id="table_container">
    <?php if(count($products) > 0) { ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Articul</th>
                <th scope="col">Image</th>
                <th scope="col">Image name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($products as $product) { ?>
            <tr>
                <th scope="row"><?= $product->id ?></th>
                <td><?= $product->name ?></td>
                <td><?= $product->articul ?></td>
                <td><img src='/storage/<?= $product->iamge ?? 'placeholder.png' ?>' style='height: 40px;'></td>
                <td><?= $product->image ?></td>
                <td><button onclick="deleteProduct(<?= $product->id ?>)">Delete</button></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <? } else { ?>
    <h4 class="text-center">No data</h4>
    <?php } ?>
</div>

<?php include_once __DIR__ . '/footer.php' ?>