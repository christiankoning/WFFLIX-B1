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
  require 'views/partials/nav.partial.php';
  ?>
      <!--      Binnenkort met data uit database-->
  <div class="profile-card">
      <h2 class="logo2">WFFLIX <h2 alt="WFFLIX""</h2>

      <h3 style="color: white; background-color: black;">eigen Gegevens:</h3><br>
          <?php
              require 'views/partials/profileView.partial.php';
          ?>
      <div style="margin: 24px 0;">
      </div>
      <table class="table table-bordered table-striped">
          <tbody>

          </tbody>
      </table><br><br>
      <button onclick="window.location.href='/Profile_update'">Edit Profile</button><br><br>
      <button onclick="window.location.href='/password_reset'">Verander Wachtwoord</button><br><br>
  </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>