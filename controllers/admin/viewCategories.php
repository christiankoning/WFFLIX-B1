<?php
require 'models/Categories.php';

$CATEGORIES = new Categories($database);
//check if there are categories
if($stmt = $CATEGORIES->showAll()) {
    if (sizeof($stmt) > 0) {
        //if there are categories return false
        $noCategories = false;
    }
    else{
        //if there are no categories return true
        $noCategories = true;

    }

}

require 'views/admin/viewCategories.view.php';