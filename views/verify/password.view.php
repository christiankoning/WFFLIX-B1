<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=Request::buildUri( '/public/css/styles.css')?>">
    <title>ADSD</title>
</head>
<body>
<?php
require 'views/partials/nav.partial.php'
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Wachtwoord veranderen</h1></div>
                <div class="col"></div>
            </div>
            <header>

                <form class="formcontainer" action="<?=Request::buildUri( '/verify/password')?>" method="post">

                    <label for="code"><b>Code</b></label><Br>
                    <input type="text" placeholder="Code*" name="code" id="code" value="<?=$code?>" required readonly="readonly"><br>


                    <label for="email"><b>E-mail</b></label><Br>
                    <input type="text" placeholder="E-mail*" name="email" id="email" value="<?=$email?>" required readonly="readonly"><br>

                    <label for="psw"><b>Nieuwe wachtwoord</b></label><br>
                    <input type="password" placeholder="Wachtwoord*" name="psw" id="psw" value="" required><br>

                    <label for="psw-repeat"><b>Herhaal wachtwoord</b></label><br>
                    <input type="password" placeholder="Herhaal wachtwoord*" name="psw-repeat" id="psw-repeat" value="" required><br>
                    <br>
                    <button type="submit" class="btn">Opslaan</button>

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
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>