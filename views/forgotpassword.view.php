<?php
require 'views/partials/head.partial.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Wachtwoord vergeten</h1></div>
                <div class="col"></div>
            </div>
            <header>
                <form class="formcontainer" action="<?=Request::buildUri( '')?>forgotpassword" method="post">
                    <label for="email"><b>E-mail</b></label><br>
                    <input type="text" placeholder="E-mail" name="email" value="<?=$email?>" required><br>

                    <button type="submit"class="btn">Aanvragen</button><br>
                    <?php
                    if (!empty($error)) {
                        echo '<div class="errorContainer">
<p class="error-message">' . $error . '</p>
</div>';
                    }

                    ?>

                </form>

            </header>

        </div>
    </div>
</div>
<?php
require 'views/partials/foot.partial.php';
?>