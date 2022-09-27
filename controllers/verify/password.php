<?php
require 'models/Verify.php';
require 'models/Users.php';

//Set values to empty so input for doesn't error out for an value not beeing set
$email = "";
$code = "";
$password = "";
$passwordRepeat = "";

//change password method
function changePassword($database) {
    //External values needed inside function
    global $code;
    global $email;
    global $password;
    global $passwordRepeat;

    //check if verify key value is in the post
    if (!isset($_POST['code'])) {
        return "Je moet een code invullen";
    }

    //check if email value is in the post
    if (!isset($_POST['email'])) {
        return "Je moet een email invullen";
    }

    //check if password value is in the post
    if (!isset($_POST['psw'])) {
        return "Je moet een wachtwoord invullen";
    }

    //check if repeat password value is in the post
    if (!isset($_POST['psw-repeat'])) {
        return "Je moet een wachtwoord invullen";
    }

    //set the values to email, code, password and repeat password so it gets filled in the form if there are any errors
    $code = $_POST['code'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $passwordRepeat = $_POST['psw-repeat'];

    //check if email is a valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Ongeldige email";
    }

    //check if email is between 3/63 chars
    if (!preg_match('/^.{3,63}$/', $email)) {
        return "Ongeldige email";
    }

    //check if the password and repeat password are the same
    if ($password != $passwordRepeat) {
        return "Wachtwoorden komen niet overeen";
    }

    //check if password is between 3/31 chars
    if (!preg_match('/^.{3,31}$/', $password)) {
        return "Ongeldig wachtwoord";
    }

    //get a verify object
    $VERIFY = new Verify($database);
    //check if there is a verify code for this email
    if (!$VERIFY->verifiyCodeExists($email)) {
        return "Ongeldige email";
    }
    //get verify codes for a email
    $verifyCode = $VERIFY->show($email);
    //compare the verify codes if they correct
    if ($verifyCode['verifyCode'] != $code) {
        return "Ongeldige code";
    }
    //check if the verify code is of type password
    if ($verifyCode['type'] != 2) {
        return "Ongeldige code";
    }
    //remove the verify code since its now used
    $VERIFY->destory($verifyCode['id']);

    //Options for hashing the password amount of layers of hashing
    $pwoptions = ['cost' => 9,];
    //Hash the password
    $hashPassword = password_hash($password, PASSWORD_BCRYPT, $pwoptions);

    //get a user object
    $USERS = new Users($database);
    //update the password of the user
    $USERS->editPassword($hashPassword, $verifyCode['userId']);

    //send the user to login
    header('Location: '.Request::buildUri( '/login'));

    return 'success';
}

//if user submits execute
if ( !empty($_POST) ) {
    //run the main function and return any errors to the user
    $error = changePassword($database);
}
//insert the url data in the fields from the url send in the mail
else {
    if (!empty($_GET["email"])) {
        $email = $_GET['email'];
    }
    if (!empty($_GET["key"])) {
        $code = $_GET['key'];
    }
}

require 'views/verify/password.view.php';