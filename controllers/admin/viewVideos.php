<?php
require 'models/Videos.php';
require 'models/Categories.php';
//check if there are videos
$VIDEOS = new Videos($database);
$CATEGORIES = new Categories($database);
if ($stmt = $VIDEOS->showAll()) {
    if (sizeof($stmt) > 0) {
        //if there are videos return false
        $noVideos = false;
    } else {
        //if there are no videos return true
        $noVideos = true;

    }
}
require 'views/admin/viewVideos.view.php';