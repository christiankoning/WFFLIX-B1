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

  <div class="profile-card">
      <h2 class="logo">WFFLIX <h2 alt="WFFLIX" style="width:100%"</h2><br><br>
      <h3 style="color: black;">Reset wachtwoord</h3>
      <form class="formcontainer" action="/password_reset" method="post">
          <label for="oldpsw"><b>Oude wachtwoord</b></label><br>
          <input type="password" placeholder="je huidige wachtwoord+" name="oldpsw"><br>

          <label for="psw"><b>Wachtwoord</b></label><br>
          <input type="password" placeholder="Wachtwoord" name="psw"><br>

          <label for="psw-repeat"><b>Herhaal Wachtwoord</b></label><br>
          <input type="password" placeholder="Herhaal Wachtwoord" name="psw-repeat"<br><br>

              <button type="submit">Verander wachtwoord</button>
          <?php
          if (!empty($error)) {
              echo '<div class="errorContainer">
<p class="error-message">' . $error . '</p>
</div>';
          }

          ?>
          </form><br>

          <button onclick="window.location.href='/profile'">terug</button>

  </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>