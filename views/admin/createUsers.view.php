<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/styles.css">
    <title>ADSD</title>
</head>
<body>
<?php
require 'views/partials/adminNav.partial.php'
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Gebruiker Aanmaken</h1></div>
                <div class="col"></div>
            </div>
            <form class="formcontainer" method="post" action="/admin/users/create">

                <label for="userName"><b>Gebruikersnaam</b></label><Br>
                <input type="text" value="" name="userName" id="userName"><br>

                <label for="userEmail"><b>E-mail</b></label><br>
                <input type="text" value="" name="userEmail" id="userEmail"><br>

                <label for="userPsw"><b>Wachtwoord</b></label><Br>
                <input type="password" value="" name="userPsw" id="userPsw"><br>

                <label for="userPsw2"><b>Wachtwoord herhalen</b></label><Br>
                <input type="password" value="" name="userPsw2" id="userPsw2"><br>

                <label for="isAdmin"><b>Is administrator</b></label><br>
                <select id="isAdmin" name="isAdmin">
                    <option value="1">Ja</option>
                    <option value="0" selected>Nee</option>
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

</body>
</html>