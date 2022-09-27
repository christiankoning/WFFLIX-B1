<?php
require 'models/Categories.php';
require 'models/StudentCourses.php';
require 'models/Videos.php';

//Set models
$CATEGORIES = new Categories($database);
$STUDENTCOURSES = new StudentCourses($database);
$COURSES = new Videos($database);

//query from the database
$categories = $CATEGORIES->showAll();




//check if there are categories
if (sizeof($categories) > 0) {
    $noCategories = false;
} else {
    $noCategories = true;
}

//check if there are no categories
if (!$noCategories) {
    //loop over each category
    foreach ($categories as $key => $category) {

        //check if a course exists for the category and the user
        if ($STUDENTCOURSES->courseExist($_SESSION['loggedInUser'], $categories[$key]['id'])) {
            //set the startedCourse variable to true
            $categories[$key]['startedCourse'] = true;

            //get the course progress of the user
            $categories[$key]['progress'] = $STUDENTCOURSES->showOne($_SESSION['loggedInUser'], $categories[$key]['id'])['progress'];

            //check if the course has any course items
            if ($COURSES->videoFromCategoryExist($categories[$key]['id'])) {
                //get all the courses from the category
                $course = $COURSES->showAllFromCategory($categories[$key]['id']);
            } else {
                //set the course to an empty array
                $course = [];
            }
            //set the courseSize
            $categories[$key]['courseSize']  = sizeof($course);
        } else {
            //Set the progress and courseSize to default (if there is no Course started by the user) and the startedCourse variable to false
            $categories[$key]['progress'] = 0;
            $categories[$key]['courseSize'] = 1;
            $categories[$key]['startedCourse'] = false;
        }

    }
}


require 'views/courseOverview.view.php';
