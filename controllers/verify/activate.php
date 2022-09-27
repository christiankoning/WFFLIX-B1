<?php
require 'models/Verify.php';
require 'models/Users.php';

//set the default return info
$header = "Onbekende error";
$info = "We konden je account niet activeren.";

//directly start checking if we can activate the account from page load

//check if email value is in the get
if (!empty($_GET["email"])) {
    //check if verify key value is in the get
    if (!empty($_GET['key'])) {
        //get a verify object
        $VERIFY = new Verify($database);
        //check if there is a verify code for this email
        if ($VERIFY->verifiyCodeExists($_GET["email"])) {
            //get verify codes for a email
            $verifyCode = $VERIFY->show($_GET["email"]);

            //compare the verify codes if they correct
            if ($verifyCode['verifyCode'] === $_GET['key']) {
                //check if the verify code is of type register
                if ($verifyCode['type'] == 1) {
                    //remove the verify code since its now used
                    $VERIFY->destory($verifyCode['id']);
                    //get a user object
                    $USERS = new Users($database);
                    //activate the user account
                    $USERS->activate($verifyCode['userId']);

                    //inform the user
                    $header = "Je account is geactiveerd!";
                    $info = "Je wordt automatisch doorgestuurd...";
                    //auto redirect the user to login after 3 seconds
                    header("refresh:3; url=".Request::buildUri( '/login'));
                }
                else {
                    $header = "Incorrecte activatie code";
                    $info = "We konden je account niet activeren.";
                }
            }
            else {
                $header = "Incorrecte activatie code";
                $info = "We konden je account niet activeren.";
            }
        }
        else {
            $header = "Incorrecte activatie code";
            $info = "We konden je account niet activeren.";
        }
    }
    else {
        $header = "Incorrecte activatie code";
        $info = "We konden je account niet activeren.";
    }
}
else {
    $header = "Incorrecte gegevens";
    $info = "We konden je account niet activeren.";
}


require 'views/verify/activate.view.php';
