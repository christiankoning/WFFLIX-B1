<?php
require 'views/partials/head.partial.php';
?>

  <div class="profile-card">
      <h2 class="logo">WFFLIX <h2 alt="WFFLIX" style="width:100%"</h2><br><br>
      <h3 style="color: black;">edit profile</h3>
      <form class="formcontainer" action="<?=Request::buildUri( '/profile-update')?>" method="post">
          <label for="userName"><b>Gebruikersnaam</b></label><Br>
          <input type="text" value="<?= $profileName; ?>" name="profileName" id="profileName"><br>

          <button type="submit" class="btn">Profiel updaten</button><br><br>
      </form>
      <?php
      if (!empty($error)) {
          echo '<div class="errorContainer">
<p class="error-message">' . $error . '</p>
</div>';
      }

      ?>
      <a class="btn" href='<?=Request::buildUri( '/profile')?>'>terug</a>
  </div>
          <br>

<?php
require 'views/partials/foot.partial.php';
?>