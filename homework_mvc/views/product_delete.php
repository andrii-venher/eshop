<?php include_once __DIR__ . '/header.php' ?>
<div class="container">
    <form action="/products/delete" method="POST">
    <div class="mb-3">
            <label for="id" class="form-label">Name</label>
            <select name="id">
                <?php foreach($products as $key => $product) { ?>
                    <option value="<?= $key ?>"><?= "{$key} - {$product['name']} ({$product['articul']})" ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include_once __DIR__ . '/footer.php' ?>