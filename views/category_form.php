<?php include_once __DIR__ . "/header.php" ?>
<?php
$categories = getCategories();
?>
<div class="container" style="width: 20%;">
    <form action="/category_create.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="<?= old('name') ?>">
        </div>
        <div class="mb-3">
            <label for="parentId" class="form-label">Parent</label>
            <?php render_view('category_select', ['categorySelectName' => 'parentId', 'withEmpty' => true]) ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include_once __DIR__ . "/footer.php" ?>