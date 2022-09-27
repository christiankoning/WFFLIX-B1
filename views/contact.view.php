<?php
require 'views/partials/head.partial.php';
?>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-7"><h1>Contact</h1></div>
                    <div class="col"></div>
                </div>
                <header>
                <div class="formcontainer">
                    <h3>Contacteer ons!</h3>
                    <form method="post">
                        <label for="email">Email</label><br>
                        <input type="text" id="email" name="email" placeholder="Uw email-adres"><br>

                        <label for="fname">Voornaam</label><br>
                        <input type="text" id="fname" name="firstName" placeholder="Uw naam.."><br>

                        <label for="lname">Achternaam</label><br>
                        <input type="text" id="lname" name="lastName" placeholder="Uw achternaam.."><br>

                        <label for="subject">Bericht</label><br>
                        <textarea id="subject" name="subject" placeholder="Type hier uw bericht.." style="height:200px"></textarea><br>

                        <input type="submit" class="btn" value="Versturen">
                        <?php
                        if (!empty($error)) {
                            echo '<div class="errorContainer">
<p class="error-message">' . $error . '</p>
</div>';
                        }

                        ?>
                    </form>
                </div>
                </header>
            </div>

        </div>
    </div>
<?php
require 'views/partials/foot.partial.php';
?>