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
                    <div class="col-7"><h1>Contact</h1></div>
                    <div class="col"></div>
                </div>
                <header>
                <div class="formcontainer">
                    <h3>Contacteer ons!</h3>
                    <form action="#">
                        <label for="fname">voornaam</label><br>
                        <input type="text" id="fname" name="firstname" placeholder="u naam.."><br>

                        <label for="lname">achternaam</label><br>
                        <input type="text" id="lname" name="lastname" placeholder="U achternaam.."><br>

                        <label for="subject">onderwerp</label><br>
                        <textarea id="subject" name="subject" placeholder="Type hier u bericht.." style="height:200px"></textarea><br>

                        <input type="submit" class="btn" value="Versturen">
                    </form>
                </div>
                </header>
            </div>

        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>