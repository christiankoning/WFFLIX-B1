<?php

require 'models/Categories.php';


//query from the database
$CATEGORIES = new Categories($database);
$categories = $CATEGORIES->showAll();



//check if there are categories
if(sizeof($categories) > 0)
{
    $noCategories = false;
}
else
{
    $noCategories = true;
}



require 'views/courseOverview.view.php';
