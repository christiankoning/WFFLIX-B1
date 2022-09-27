<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>ADSD</title>
  </head>
  <body>
  <?php
require 'views/partials/nav.partial.php'
  ?>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-7"><h1>Docenten!</h1></div>
                    <div class="col"></div>
                </div>
                <!--temporary---------------------------------------------------------->
                <div class="helpcontainer" style="margin-left: 30%;">
                    <br><br><br><br>
                    <h4>(temporary) admin view pages help:</h4>
                <h5><?= $userview; ?></h5>
                <h5><?= $categorieview; ?></h5>
                <h5><?= $videosview; ?></h5><br>
                    <h5>email: user@wfflix.com pass: user</h5>
                    <h5>email: admin@wfflix.com pass: admin</h5>
                </div>
                <!--temporary---------------------------------------------------------->
            </div>

            </div>

        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>