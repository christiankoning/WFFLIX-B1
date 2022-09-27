<?php
require 'models/Users.php';

$id = $_POST['userId'];
$idName = 'userId';

//check if the id has been set
if (!isset($id)) {
    return header('location: '.Request::buildUri( '/admin/users'));
}
//set model en model description for the view
$model = 'users';
$modelName = 'gebruiker';
$modelDesc = 'deze gebruiker';

//select information about current user
$USERS = new Users($database);
$users=  $USERS->showOne($id);

//get data from query
$userEmail = 'Email: ' . $users['email'];
$userName = 'Gebruikersnaam: ' . $users['name'];

//check if the post variables have been set
if (isset($id) && isset($_POST['confirmDelete'])) {
    try {
        //execute query
        $USERS->destory($id);
        return header('location: '.Request::buildUri( '/admin/users'));
    } catch (Exception $exception) {
        //show exception message
        die(var_dump($exception->getMessage()));
    }

}

require 'views/admin/deleteConfirm.view.php';