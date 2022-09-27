<?php

require 'models/Profile.php';
$PROFILE = new Profile($database);
if($stmt= $PROFILE->getProfileData($_SESSION['loggedInUser'])) {

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
