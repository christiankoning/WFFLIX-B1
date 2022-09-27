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
                <div class="col-7"><h1>Update Videos</h1></div>
                <div class="col"></div>
            </div>
            <form class="formcontainer" method="post" action="/admin/videos/update">
                <input type="number" name="videoId" value="<?= $id ?>" hidden="true">

                <label for="videoTitle"><b>Titel</b></label><Br>
                <input type="text" value="<?= $videoTitle; ?>" name="videoTitle" id="videoTitle"><br>

                <label for="videoDescription"><b>Omschrijving</b></label><br>
                <textarea maxlength="256" type="text" name="videoDescription" id="videoDescription"
                ><?= $videoDesc; ?></textarea><br>
                <label for="videoLink"><b>Youtube Link</b></label><br>
                <input type="text" value="<?= $videoLink; ?>" name="videoLink" id="videoLink"><br>

                <label id="videoCategory" for="videoCategory"><b>Video categorie</b></label><br>
                <select name="videoCategory">
                    <?php
                    foreach ($categories as $category) {
                        echo '<option value="'.  $category['id']   .'"';
                             if ($category['id'] == $categoryId) {
                                 echo ' selected';
                             }
                             echo '>' . $category['name'] . ' </option>';

                    } 
                    ?>

                </select>
                <br>
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
