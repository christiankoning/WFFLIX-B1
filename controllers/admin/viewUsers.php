<?php
require 'models/Users.php';
//check if there are users
$USERS = new Users($database);
if($stmt = $USERS->showAll()) {
    if (sizeof($stmt) > 0) {
        //if there are users return false
        $noUsers = false;
    }
    else {
        //if there are no users return true
        $noUsers = true;
    }

}

require 'views/admin/viewUsers.view.php';
?>

