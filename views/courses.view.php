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
require 'views/partials/nav.partial.php'
?>
<div class="container-fluid">
    <div class="row mx-auto">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col-2"></div>
                <div class="col-8 mx-auto d-flex justify-content-center text-wrap text-center"><h1
                            class="h1"><?= $category['name'] ?></h1></div>
                <div class="col-2"></div>
            </div>
            <div class="row mx-auto mb-2">
                <h3 class="text-wrap text-center"">Progressie cursus: </h3>
            </div>
            <?php
            if (!Auth::isAdmin()){
            ?>
            <div class="progress mb-2">
                <div class="progress-bar" role="progressbar" style="width: <?=$progress == 0 ? '0' : $progress/count($courses)  * 100?>%;" aria-valuenow=" */<?=$progress == 0 ? '0' : $progress/count($courses)  * 100?>" aria-valuemin="0" aria-valuemax="100"> <?=$progress == 0 ? '0' : $progress/count($courses)  * 100?>%</div>
            </div>
                <?php
            }
            ?>
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-3">
                <?php
                if ($noCourses) {
                    echo '<div class="alert alert-danger mx-auto"><em>Geen Cursussen.</em></div>';
                } else {
                    ?>
                    <?php
                    foreach ($courses as $course) {
                        require 'views/partials/course.partial.php';
                        $courseSize = $courseSize + 1;
                    }
                    ?>
                    </tbody>
                    </table>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>