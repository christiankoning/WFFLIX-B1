<?php

require 'models/Login.php';

//Set value to empty so input for doesn't error out for an value not beeing set
$email = '';
$password = '';

//Main function

function login() {
    //External values needed inside function
    global $email;
    global $password;

    //check if email value is in the post
    if (!isset($_POST['email'])) {
        return "Je moet een email invullen!";
    }

    //check if password is in the post
    if (!isset($_POST['psw'])) {
        return "Je moet een wachtwoord invullen!";
    }

    //set the values to email and password so it gets filled in the form if there are any errors
    $email = $_POST['email'];
    $password = $_POST['psw'];

    //check if email is a valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Ongeldige email!";
    }

    //check if email is between 3/63 chars
    if (!preg_match('/^.{3,63}$/', $email)) {
        return "Ongeldige email!";
    }

    //check if password is between 3/31 chars
    if (!preg_match('/^.{3,31}$/', $password)) {
        return "Ongeldig wachtwoord!";
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

    //check if password is correct
    if (!password_verify($password, $DBpass['msg'][0]['password'])) {
        return "Incorrect wachtwoord!";
    }

    //regenerate session to prevent Session fixation attacks
    session_regenerate_id(true);

    //set session data to keep a user logged in for a time span
    $_SESSION['loggedIn'] = TRUE;
    $_SESSION['isAdmin'] = $DBpass['msg'][0]['isAdmin'];
    $_SESSION['loggedInUser'] = $DBpass['msg'][0]['id'];
    //send user back to home
    header('Location: /');

    return 'success';
}

//if user submits execute
if ( !empty($_POST) ) {
    //run the main function and return any errors to the user
    $error = login();
}


require 'views/login.view.php';
