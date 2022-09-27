<?php
require 'models/Users.php';
//POST userId gotten from the overview page
$id = $_SESSION['loggedInUser'];
//check if id is set to prevent accidental errors
if (!isset($id)) {
    header('location: '.Request::buildUri( '/profile'));
}

$password = "";
$passwordRepeat = "";
$profilePasswordOld = "";

//Main function

function changePassword($database) {
    //External values needed inside function

    global $password;
    global $passwordRepeat;
    global $profilePasswordOld;
    global $id;

    //check if repeat password value is in the post
    if (!isset($_POST['oldpsw']) || empty($_POST['oldpsw'])) {
        return "Je moet het oude wachtwoord invullen";
    }
    //check if email value is in the post
    if (!isset($_POST['psw']) || empty($_POST['psw'])) {
        return "Je moet een wachtwoord invullen";
    }

    //check if password value is in the post
    if (!isset($_POST['psw-repeat']) || empty($_POST['psw-repeat'])) {
        return "Je moet wachtwoord herhalen";
    }


    //set the values to password and repeat password so it gets filled in the form if there are any errors
    $password = $_POST['psw'];
    $passwordRepeat = $_POST['psw-repeat'];
    $profilePasswordOld = $_POST['oldpsw'];

    $PROFILEPSW = new Users($database);
//checks password db
    if (!password_verify($profilePasswordOld, $PROFILEPSW->showOne($id)['password'])) {
        return "Het oude wachtwoord klopt niet!";
    }
    //check if password is between 3/31 chars
    if (!preg_match('/^.{3,31}$/', $password)) {
        return "Ongeldig wachtwoord";
    }
    //check if the password and repeat password are the same
    if ($password != $passwordRepeat) {
        return "Wachtwoorden komen niet overeen";
    }



    //Options for hashing the password amount of layers of hashing
    $pwoptions = ['cost' => 9,];
    //Hash the password
    $hashPassword = password_hash($password, PASSWORD_BCRYPT, $pwoptions);
    //get a user object


    $PROFILEPSW->EditPassword($hashPassword, $id);
    //send the user to login
    return 'success! Wachtwoord succesvol veranderd!';
        }
//if user submits execute
if ( !empty($_POST) ) {
    //run the main function and return any errors to the user
    $error = changePassword($database);
}
require 'views/ProfileActions/passwordReset.view.php';
