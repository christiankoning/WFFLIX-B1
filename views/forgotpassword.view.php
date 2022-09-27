<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">
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
                <div class="col-7"><h1>Wachtwoord vergeten</h1></div>
                <div class="col"></div>
            </div>
            <header>
                <form class="formcontainer" action="forgotpassword" method="post">
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
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>