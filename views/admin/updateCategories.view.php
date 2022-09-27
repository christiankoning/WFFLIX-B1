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
                <div class="col-7"><h1>Update Categoriën</h1></div>
                <div class="col"></div>
            </div>
            <form class="formcontainer" method="post" action="/admin/categories/update">
                <input type="number" name="categoryId" value="<?= $id ?>" hidden="true">

                <label for="categoryName"><b>Naam</b></label><Br>
                <input type="text" value="<?= $categoryName; ?>" name="categoryName" id="categoryName"><br>

                <label for="categoryDescription"><b>Omschrijving</b></label><br>
                <textarea maxlength="256" type="text" name="categoryDescription" id="categoryDescription"
                ><?= $categoryDesc; ?></textarea><br>
                <button type="submit" class="btn">Updaten</button>
            </form>
            <?php
            if (!empty($error)) {
                echo '<div class="errorContainer">
<p class="error-message">' . $error . '</p>
</div>';
            }

            ?>
        </div>
    </div>
</div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>