<?php

require 'models/Login.php';
require 'models/Verify.php';
require 'controllers/Key.php';
require 'controllers/Mail.php';
require 'models/Users.php';

//Set value to empty so input for doesn't error out for an value not beeing set
$email = "";

//Main function

function forgotpassword() {
    //External values needed inside function
    global $email;
    global $database;

    //check if email value is in the post
    if (!isset($_POST['email'])) {
        return "Je moet een email invullen!";
    }

    //set the value to email so it gets filled in the form if there are any errors
    $email = $_POST['email'];

    //check if email is a valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Ongeldige email!";
    }

    //check if email is between 3/63 chars
    if (!preg_match('/^.{3,63}$/', $email)) {
        return "Ongeldige email!";
    }

    //get the user data by email
    $DBpass = Login::getDataForEmail($email);

    //check if the email exists
    if (empty($DBpass['msg'])) {
        return "Email is niet bij ons bekend!";
    }

    //check if the acount is activated
    if (!$DBpass['msg'][0]['active']) {
        return "Account is nog niet geactiveerd controleer je email.";
    }

    $id = $DBpass['msg'][0]['id'];
    $name = $DBpass['msg'][0]['name'];

    //generate a unique key for validation
    $code = Key::GenKey();

    //get a verify object
    $VERIFY = new Verify($database);

    //get verify codes for a email
    $verifyCheck = $VERIFY->show($email);

    //check if user already has a verify code if so edit it otherwise create a new one
    if (empty($verifyCheck['msg'])) {
        $VERIFY->create($id, $code, 2);
    }
    else {
        $VERIFY->edit($verifyCheck['msg'][0]['id'], $code, 2);
    }

    //send a email to the user
    Mail::send($email, "Wachtwoord veranderen van je WFFlix account", "\nBeste ".$name.",\n\nWijzig je wachtwoord.\n\nKlik op de onderstaande link om je wachtwoord te wijzigen.\nwww.wfflix.nl/verify/password?email=".$email."&key=".$code."\n\nMet vriendelijke groet,\nTeam WFFlix\n\nDit is een automatische mail.");

    //Temp session data so we know who is entering the page
    $_SESSION["email"] = $email;
    $_SESSION["crossPageData"] = "Wijzig je wachtwoord";

    //Inform the user with info
    header('Location: /verify/send');

    return 'success';
}

//if user submits execute
if ( !empty($_POST) ) {
    //run the main function and return any errors to the user
    $error = forgotpassword();
}


require 'views/forgotpassword.view.php';