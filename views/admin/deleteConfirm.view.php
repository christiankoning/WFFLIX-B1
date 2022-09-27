<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/styles.css">
    <title>ADSD</title>
</head>
<body>
<?php
require 'views/partials/adminNav.partial.php'
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Verwijder <?= $modelName ?></h1></div>
                <div class="col"></div>
            </div>
            <form class="formcontainer" method="post" action="<?= '/admin/' . $model . '/delete' ?>">
                <input type="number" name="<?= $idName ?>" value="<?= $id ?>" hidden="true">
                <input type="number" name="confirmDelete" value="1" hidden="true">

                <h2>Weet u zeker dat u <?= $modelDesc ?> wilt verwijderen?</h2>
                <h3>Informatie over <?= $modelName?>:</h3>
                <?php
                if ($model === 'users')
                {
                    ?>
                <p><?= $userEmail  ?></p>
                <p><?= $userName ?></p>
                <?php
                }
                else if ($model === 'categories')
                {
                    ?>
                <p><?= $categoryName  ?></p>
                <p><?= $categoryDesc ?></p>
                <?php
                }
                else if ($model === 'videos')
                {
                    ?>
                <p><?= $videoTitle  ?></p>
                <p><?= $videoDesc?></p>
                <p><?= $videoLink?></p>
                <?php
                }
                ?>

                <a href="<?= '/admin/' . $model ?>">Annuleren</a>
                <button type="submit" class="btn">Verwijder definitief</button>
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>
