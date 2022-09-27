<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/styles.css">
    <title>ADSD</title>
</head>
<body>
<?php
require 'views/partials/nav.partial.php'
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="col-md-8 mx-auto">
                <h1><?= $video['title'] ?></h1>
                <div class="ratio ratio-16x9">
                    <iframe allowfullscreen src="<?= $videoUrl ?>"></iframe>
                </div>
                <br />
                <p><?= $video['description'] ?></p>
                <br />
                <form method="post" action="/courses/start">
                    <input type="hidden" name="courseId" value="<?= $video['categoryId'] ?>">
                    <input type="hidden" name="progress" value="<?= $progress ?>">
                    <button class="btn btn-primary" type="submit" <?=Auth::isAdmin() || $progress > $courseSize ? 'disabled' : '' ?>><?=Auth::isAdmin() || $progress > $courseSize ? 'Je hebt dit onderdeel al afgerond' : 'Onderdeel afronden' ?></button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>

