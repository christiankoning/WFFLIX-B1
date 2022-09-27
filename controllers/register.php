<?php


require 'models/register.php';
require 'models/Verify.php';
require 'controllers/Key.php';
require 'controllers/Mail.php';
require 'models/Users.php';

//Set values to empty so input for doesn't error out for an value not beeing set
$name = '';
$email = '';
$password = '';
$passwordRepeat = '';

//Main function
function register() {

    //External values needed inside function
    global $name;
    global $email;
    global $password;
    global $passwordRepeat;
    global $database;

    //check if name value is in the post
    if (!isset($_POST['name'])) {
        return "Je moet een naam invullen";
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

    //set the values to email, name, password and repeatpassword so it gets filled in the form if there are any errors
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $passwordRepeat = $_POST['psw-repeat'];

    //check if there is already an account with this email
    if (Register::checkEmailExist($email)) {
        return "Email is bij ons al geregistreerd";
    }

    //check if the name starts with a letter conains valid chars and is between 3/31 long
    if (!preg_match('/^[A-Za-z][A-Za-z0-9_]{3,31}$/', $name)) {
        return "Ongeldige naam";
    }

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

    //Options for hashing the password amount of layers of hashing
    $pwoptions = ['cost' => 9,];
    //Hash the password
    $hashPassword = password_hash($password, PASSWORD_BCRYPT, $pwoptions);

    //register the user
    Register::createUser($name, $email, $hashPassword);

    //get a user object
    $USERS = new Users($database);
    //get the user id of the user that just registerd
    $id = $USERS->showOneId($email);

    //generate a unique key for validation
    $code = Key::GenKey();

    //get a verify object
    $VERIFY = new Verify($database);
    //store the verify code for the just registered user
    $VERIFY->create($id['id'], $code, 1);

    //send a email with the info for verifying ur account
    Mail::send($email, "Activeer je WFFlix account", "\nBeste ".$name.",\n\nActiveer je WFFlix account.\n\nKlik op de onderstaande link om je account te activeren.\nwww.wfflix.nl/verify/activate?email=".$email."&key=".$code."\n\nMet vriendelijke groet,\nTeam WFFlix\n\nDit is een automatische mail.");

    //Temp session data so we know who is entering the page
    $_SESSION["email"] = $email;
    $_SESSION["crossPageData"] = "Verifeer je account";

    //Inform the user with info
    header('Location: /verify/send');
    return "Success";
}

//if user submits execute
if ( !empty($_POST) ) {
    //run the main function and return any errors to the user
    $error = register();
}

require 'views/register.view.php';