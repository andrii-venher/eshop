<?php include_once __DIR__ . '/header.php' ?>
<div class="container">
    <form action="/products" enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="articul" class="form-label">Articul</label>
            <input type="text" class="form-control" name="articul">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" accept=".png, .jpg">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include_once __DIR__ . '/footer.php' ?>