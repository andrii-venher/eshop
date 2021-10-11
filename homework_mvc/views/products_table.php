<?php include_once __DIR__ . '/header.php' ?>
<div class="container">
    <?php if(count($products) > 0) { ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Articul</th>
                <th scope="col">Image</th>
                <th scope="col">Image name</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($products as $key => $product) { ?>
            <tr>
                <th scope="row"><?= $key ?></th>
                <td><?= $product['name'] ?></td>
                <td><?= $product['articul'] ?></td>
                <td><img src='/storage/<?= $product['image'] ?? 'placeholder.png' ?>' style='height: 40px;'></td>
                <td><?= $product['image'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <? } else { ?>
    <h4 class="text-center">No data</h4>
    <?php } ?>
</div>

<?php include_once __DIR__ . '/footer.php' ?>