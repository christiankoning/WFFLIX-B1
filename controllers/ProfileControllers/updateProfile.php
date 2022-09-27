<?php
require 'models/Users.php';
//POST userId gotten from the overview page
$id = $_SESSION['loggedInUser'];
//check if id is set to prevent accidental errors
if (!isset($id))
{
    header('location: '.Request::buildUri( '/profile'));
}
//Query from the database
$USERS = new Users($database);

$user = $USERS->showOne($id);
//var_dump($user);
//data from the database
$profileName = $user['name'];
$profileEmail = $user['email'];
$profileRole = $user['role'];

//Check if the form data excist (only the id exisist at the start)
if (isset($id) && isset($_POST['profileName'])) {
    try {
        //Connecting post data to variables for easy adjustments
        $profileName = $_POST['profileName'];
        //Check if username and email are not empty
        if (!empty($profileName)) {
            if (!preg_match('/^[A-Za-z][A-Za-z0-9]{3,31}$/', $profileName)) {
                //show error if the username is not valid
                $error = 'Gebruikersnaam moet langer zijn dan 3 karakters, mag niet langer zijn dan 32 karakters en de gebruikersnaam moet starten met een letter!';
            } else {
                //execute query if all the statements are valid

                $USERS->edit($profileName, $profileEmail, $profileRole, $id);
                //return to the overview page
                header('location: '.Request::buildUri( '/profile'));
            }
        }
    }
    catch (Exception $exception) {
        //show error message if an exception happens for debugging
        die(var_dump($exception->getMessage()));
    }
}
//show view
require 'views/ProfileActions/ProfileUpdate.view.php';
