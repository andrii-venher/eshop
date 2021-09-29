<?php include_once __DIR__ . "/header.php" ?>
<div class="container">
    <?php 
    $categories = getCategories();
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">ParentId</th>
            </tr>
        </thead>
        <tbody>
            <?php if($categories) {
              foreach($categories as $category) { ?>
                <tr>
                    <th scope="row"><?= $category['id'] ?></th>
                    <td><?= $category['name'] ?></td>
                    <td><?= $category['parentId'] > 0 ? $category['parentId'] : '' ?></td>
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