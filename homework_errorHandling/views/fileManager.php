<?php include_once __DIR__ . '/header.php' ?>
<div class="container">
    <form action="/fileManager" enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label for="image" class="form-label">Images</label>
            <input class="form-control" type="file" name="image[]" accept=".png, .jpg" multiple="true">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<br />
<br />
<div class="container">
    <table class="table">
    <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">File name</th>
                <th scope="col" colspan="2">Actions</th>
            </tr>
    </thead>
    <?  if(count($files) <= 0) { ?>
    <h4>No files</h4>
    <?php } else {
        
        foreach($files as $file) { ?>
    <tr>
        <form action="/fileManager/delete" method="POST" style="display: inline-block;">
            <td><img src="/storage/fileManager/<?= $file ?>" style="height: 50px;"></td>
            <td><label><?= $file ?></label></td>
            <td><button name="file" value="<?= $file ?>">Delete</button></td>
            
        </form>
        <form action="/fileManager/update" method="POST" style="display: inline-block;">
        <td>
            <input type="text" name="name">
            <button name="file" value="<?= $file ?>">Rename</button>
        </td>
            
        </form>
    </tr>
    <?php }
    } ?>
    </table>
</div>
<?php include_once __DIR__ . '/footer.php' ?>