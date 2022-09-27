<?php
require 'views/partials/head.partial.php';
?>
  <div class="profile-card">
      <h2 class="logo">WFFLIX <h2 alt="WFFLIX" style="width:100%"</h2><br><br>
      <h3 style="color: black;">Reset wachtwoord</h3>
      <form class="formcontainer" action="<?=Request::buildUri( '/password-reset')?>" method="post">
          <label for="oldpsw"><b>Oude wachtwoord</b></label><br>
          <input type="password" placeholder="je huidige wachtwoord" name="oldpsw"><br>

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

          <a class="btn" href='<?=Request::buildUri( '/profile')?>'>terug</a>

  </div>

<?php
require 'views/partials/foot.partial.php';
?>