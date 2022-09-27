<header>


<form class="formcontainer" action="register" method="post">

        <label for="name"><b>Naam</b></label><Br>
        <input type="text" placeholder="Naam*" name="name" id="name" value="<?=$name?>" required><br>


        <label for="email"><b>E-mail</b></label><Br>
        <input type="text" placeholder="E-mail*" name="email" id="email" value="<?=$email?>" required><br>

        <label for="psw"><b>Wachtwoord</b></label><br>
        <input type="password" placeholder="Wachtwoord*" name="psw" id="psw" value="<?=$password?>" required><br>

        <label for="psw-repeat"><b>Herhaal wachtwoord</b></label><br>
        <input type="password" placeholder="Herhaal wachtwoord*" name="psw-repeat" id="psw-repeat" value="<?=$passwordRepeat?>" required><br>
        <br>
        <button type="submit" class="btn">Registreren</button>

        <?php
        if (!empty($error)) {
            echo '<div class="errorContainer">
<p class="error-message">' . $error . '</p>
</div>';
        }

        ?>
    <div class="container"><br><Br><br>
        <h3>Heb je al een account?</h3>
        <button onclick="window.location.href='/login'" type="button" class="btn">Inloggen</button>
    </div>

</form>


</header>