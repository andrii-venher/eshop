<select class="form-select" name="<?= $categorySelectName ?? 'categorySelectName' ?>">
    <?php if($withEmpty == true) { ?> 
        <option value="0"></option>
    <?php } ?>
    <?php foreach(getCategories() as $category) { ?>
        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
    <?php } ?>
</select>