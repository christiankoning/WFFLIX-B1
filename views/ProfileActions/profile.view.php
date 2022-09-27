<?php
require 'views/partials/head.partial.php';
?>
<div class="profile-card">
    <h2 class="logo2">WFFLIX <h2 alt="WFFLIX""</h2>

    <h3 class="bg-dark text-white" ">Gegevens:</h3><br>
    <?php
    require 'views/partials/profileView.partial.php';
    ?>
    <div style="margin: 24px 0;">
    </div>
    <br><br>
    <a class="btn" href='<?= Request::buildUri('/profile-update') ?>'>Bewerk profiel</a>
    <br><br>
    <a class="btn" href='<?= Request::buildUri('/password-reset') ?>'>Verander Wachtwoord</a>
    <br><br>
</div>

<?php
require 'views/partials/foot.partial.php';
?>