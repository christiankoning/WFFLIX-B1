<?php
require 'views/partials/adminHead.partial.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Update gebruiker</h1></div>
                <div class="col"></div>
            </div>
            <form class="formcontainer" method="post" action="<?=Request::buildUri( '/admin/users/update')?>">
                <input type="number" name="userId" value="<?= $id ?>" hidden="true">

                <label for="userName"><b>Gebruikersnaam</b></label><Br>
                <input type="text" value="<?= $userName; ?>" name="userName" id="userName"><br>

                <label for="userEmail"><b>Email</b></label><br>
                <input type="text" value="<?= $userEmail; ?>" name="userEmail" id="userEmail"
                ><br>

                <label for="userRole"><b>Gebruikers Rol</b></label><br>
                <select id="userRole" name="userRole">
                    <option value="0" <?php if ($userRole == 0) {
                        echo ' selected';
                    } ?>>Student
                    </option>
                    <option value="1" <?php if ($userRole == 1) {
                        echo ' selected';
                    } ?>>Leraar
                    </option>
                    <option value="2" <?php if ($userRole == 2) {
                        echo ' selected';
                    } ?>>Administrator
                    </option>
                </select>
                <br>
                <button type="submit" class="btn">Updaten</button>
            </form>
            <?php
            if (!empty($error)) {
                echo '<div class="errorContainer">
<p class="error-message">' . $error . '</p>
</div>';
            }

            ?>
        </div>
    </div>
</div>
<?php
require 'views/partials/foot.partial.php';
?>