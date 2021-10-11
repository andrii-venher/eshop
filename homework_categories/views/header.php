<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="/styles/main.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="">e-shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="/">Home</a>
                        <a class="nav-link" href="/product_show.php">Create product</a>
                        <a class="nav-link" href="/product_table.php">Product table</a>
                        <a class="nav-link" href="/category_show.php">Create category</a>
                        <a class="nav-link" href="/category_table.php">Category table</a>
                        <a class="nav-link" href="/debug.php">Debug</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <?php if(!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach($errors as $error) { ?>
                    <li><?= $error ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <?php if(hasSuccessMessage()) { ?>
            <div class="alert alert-success" role="alert">
                <?= getSuccessMessage() ?>
            </div>
        <?php } ?>
    </div>