<?php
require 'models/Users.php';
require 'models/Categories.php';
require 'models/Videos.php';

//create static variables for the users model, the categories model and the videos model
$USERS = new Users($database);
$CATEGORY = new Categories($database);
$VIDEOS = new Videos($database);

//get the amount of record of all the users, categories and videos tables
$userSize = sizeof($USERS->showAll());
$categorySize = sizeof($CATEGORY->showAll());
$videoSize = sizeof($VIDEOS->showAll());

require 'views/admin/admin.view.php';