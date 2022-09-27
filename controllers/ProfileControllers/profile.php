<?php
require 'models/Users.php';
$PROFILE = new Users($database);
if($stmt= $PROFILE->showOne($_SESSION['loggedInUser'])) {

    if (sizeof($stmt) > 0) {
        //if there are users return false
        $noprofile = false;
    }
    else{
        //if there are no users return true
        $noprofile = true;
    }

}
require 'views/ProfileActions/profile.view.php';
