<?php include_once __DIR__ . "/header.php" ?>
<div class="container" style="width: 20%;">
    <form action="/product_create.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="<?= old('name') ?>">
        </div>
        <div class="mb-3">
            <label for="articul" class="form-label">Articul</label>
            <input type="text" class="form-control" name="articul" value="<?= old('articul') ?>">
        </div>
        <div class="mb-3">
            <label for="categoryId" class="form-label">Category</label>
            <?php render_view('category_select', ['categorySelectName' => 'categoryId']) ?>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control"><?= old('description') ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>  
<?php include_once __DIR__ . "/footer.php" ?>