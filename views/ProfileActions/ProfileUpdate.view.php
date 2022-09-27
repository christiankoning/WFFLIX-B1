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
      <h3 style="color: black;">edit profile</h3>
      <form class="formcontainer" action="/Profile_update" method="post">
          <label for="userName"><b>Gebruikersnaam</b></label><Br>
          <input type="text" value="<?= $ProfileName; ?>" name="ProfileName" id="ProfileName"><br>

          <button type="submit" class="btn">Profiel updaten</button><br><br>
      </form>
      <?php
      if (!empty($error)) {
          echo '<div class="errorContainer">
<p class="error-message">' . $error . '</p>
</div>';
      }

      ?>
      <button onclick="window.location.href='/profile'">terug</button>
  </div>
          <br>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>