<?php
require 'models/Users.php';

//Set value to empty so input for doesn't error out for an value not beeing set
$email = '';
$password = '';

//Login method
function login($database) {
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
    $USER = new Users($database);
    $DBpass = $USER->getDataForEmail($email);

    //check if the email exists
    if (!$USER->checkEmailExist($email)) {
        return "Email is niet bij ons bekend!";
    }

    //check if the acount is activated
    if (!$DBpass['active']) {
        return "Account is nog niet geactiveerd controleer je email.";
    }

    //check if password is correct
    if (!password_verify($password, $DBpass['password'])) {
        return "Incorrect wachtwoord!";
    }

    //regenerate session to prevent Session fixation attacks
    session_regenerate_id(true);

    //set session data to keep a user logged in for a time span
    $_SESSION['loggedIn'] = TRUE;
    $_SESSION['role'] = $DBpass['role'];
    $_SESSION['loggedInUser'] = $DBpass['id'];
    //send user back to home
    header('Location: '.Request::buildUri( '/'));

    return 'success';
}

//if user submits execute
if ( !empty($_POST) ) {
    //run the main function and return any errors to the user
    $error = login($database);
}


require 'views/login.view.php';
