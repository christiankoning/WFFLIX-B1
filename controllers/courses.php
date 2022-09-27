<?php
require 'models/Videos.php';
require 'models/Categories.php';
require 'models/StudentCourses.php';


//POST courseId gotten from the overview page
$id = $_POST['courseId'];
//die(var_dump($id));
//check if id is set to prevent accidental errors
if (!isset($id)) {
    return header('location: '.Request::buildUri( '/courses'));
}
//
//get from database
$STUDENTCOURSES = new StudentCourses($database);
if (!empty($_POST)) {
    if (isset($id)) {
        //check if userId has not already been created with the courseId

        if (!$STUDENTCOURSES->courseExist($_SESSION['loggedInUser'], $_POST['courseId']) && !Auth::isAdmin() && !Auth::isTeacher()) {
            //add user to course if they did not join the course
            $STUDENTCOURSES->create($_SESSION['loggedInUser'], $_POST['courseId']);
        } // Check if progress is set to prevent errors
        elseif (isset($_POST['progress'])) {
            // Progress value + 1
            $progressNum = $_POST['progress'] + 1;

            // Update studentCourse
            $STUDENTCOURSES->edit($progressNum, $_SESSION['loggedInUser'], $id);
            //check if stopCourse has been send to activate the delete action
        } elseif (isset($_POST['stopCourse'])) {
            $STUDENTCOURSES->destory($_SESSION['loggedInUser'], $id);
            return header('location: '.Request::buildUri( '/courses'));
        }
    }

}

$CATEGORIES = new Categories($database);
$category = $CATEGORIES->showOne($id);
//Query from the database
$COURSES = new Videos($database);


$STUDENTCOURSES = new StudentCourses($database);
//query from the database
if ($STUDENTCOURSES->courseExist($_SESSION['loggedInUser'], $_POST['courseId']) && !Auth::isAdmin()) {
    $progress = $STUDENTCOURSES->showOne($_SESSION['loggedInUser'], $id)['progress'];
}

//set variable to get the courses that are accessible
$courseSize = 0;

//get all courses from the category
if ($COURSES->videoFromCategoryExist($id)) {
    $courses = $COURSES->showAllFromCategory($id);
} else {
    $courses = [];
}

if (sizeof($courses) > 0) {
    //if there are videos return false
    if (Auth::isAdmin() || Auth::isTeacher()) {

        $progress = sizeof($courses);
    }
    $noCourses = false;
} else {
    //if there are no videos return true
    $noCourses = true;
    }

foreach ($courses as $key => $course) {
    $imageId = explode('=', $course['youtubeLink']);
    $youtubeThumbnail = 'https://img.youtube.com/vi/' . $imageId[1] . '/mqdefault.jpg';
    $courses[$key]['tumbnail'] = 'https://img.youtube.com/vi/' . $imageId[1] . '/mqdefault.jpg';
}
require 'views/courses.view.php';