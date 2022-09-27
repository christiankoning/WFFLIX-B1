<?php
require 'views/partials/adminHead.partial.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Gebruiker Aanmaken</h1></div>
                <div class="col"></div>
            </div>
            <form class="formcontainer" method="post" action="<?=Request::buildUri( '/admin/users/create')?>">

                <label for="userName"><b>Gebruikersnaam</b></label><Br>
                <input type="text" value="" name="userName" id="userName"><br>

                <label for="userEmail"><b>E-mail</b></label><br>
                <input type="text" value="" name="userEmail" id="userEmail"><br>

                <label for="userPsw"><b>Wachtwoord</b></label><Br>
                <input type="password" value="" name="userPsw" id="userPsw"><br>

                <label for="userPsw2"><b>Wachtwoord herhalen</b></label><Br>
                <input type="password" value="" name="userPsw2" id="userPsw2"><br>

                <label for="userRole"><b>Gebruikers Rol</b></label><br>
                <select id="userRole" name="userRole">
                    <option value="0" selected>Student</option>
                    <option value="1">Leraar</option>
                    <option value="2">Administrator</option>
                </select>
                <br>
                <button type="submit" class="btn">Gebruiker aanmaken</button>
            </form>
            <?php
            if (!empty($error))
            {
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