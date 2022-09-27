<?php
require 'models/Users.php';
//POST userId gotten from the overview page
$id = $_POST['userId'];
//check if id is set to prevent accidental errors
if (!isset($id))
{
    return header('location: /admin/users');
}
//Query from the database
$USERS = new Users($database);
$user = $USERS->showOne($id);

//data from the database
$userName = $user['name'];
$userEmail = $user['email'];
$userIsAdmin = $user['isAdmin'];


//Check if the form data excist (only the id exisist at the start)
if (isset($id) && isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userIsAdmin'])) {
    try {
        //Connecting post data to variables for easy adjustments
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $userIsAdmin = $_POST['userIsAdmin'];
        //Check if username and email are not empty
        if (!empty($userName) && !empty($userEmail)) {
            //validate the email adress
            if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                //show error if the email is not valid
                $error = 'Dit is geen valide email adres!';
                //validate the username (min length 4, starts with an letter and is not longer then 32 characters)
            } else if (!preg_match('/^[A-Za-z][A-Za-z0-9]{3,31}$/', $userName)) {
                //show error if the username is not valid
                $error = 'Gebruikersnaam moet langer zijn dan 3 karakters, mag niet langer zijn dan 32 karakters en de gebruikersnaam moet starten met een letter!';
            } else {
                //execute query if all the statements are valid
                $USERS->edit($userName, $userEmail, $userIsAdmin, $id);
                //return to the overview page
                return header('location: /admin/users');
            }
            //check which input is empty
        } else {
            //show error if one are empty (userName and userEmail)
            if (empty($userEmail)) {
                $error = 'De gebruikersnaam mag niet leeg zijn!';
            } elseif (empty($userEmail)) {
                $error = 'Het emailadres mag niet leeg zijn!';
            }
        }
    } catch (Exceptionn $exception) {
        //show error message if an exception happens for debugging
        die(var_dump($exception->getMessage()));
    }
}
//show view
require 'views/admin/updateUsers.view.php';