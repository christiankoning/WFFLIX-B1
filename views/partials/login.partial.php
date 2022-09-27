<header>
    <form class="formcontainer" action="<?=Request::buildUri( '/login')?>" method="post">
        <label for="email"><b>E-mail</b></label><br>
        <input type="text" placeholder="E-mail" name="email" value="<?=$email?>" required><br>

        <label for="psw"><b>Wachtwoord</b></label><br>
        <input type="password" placeholder="Wachtwoord" name="psw" required><br><br>

        <button type="submit"class="btn">Inloggen</button><br>
        <a href="<?=Request::buildUri( '/forgotpassword')?>">Wachtwoord vergeten?</a><br>
        <?php
        if (!empty($error)) {
            echo '<div class="errorContainer">
<p class="error-message">' . $error . '</p>
</div>';
        }

        ?>

        <label><br>
            <button  onclick="window.location.href='<?=Request::buildUri( '/')?>'" type="button" class="btn">Annuleren</button>
            <button onclick="window.location.href='<?=Request::buildUri( '/register')?>'" type="button" class="btn">Registreren</button>

    </form>

</header>
