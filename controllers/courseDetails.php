<?php
require 'models/Videos.php';
require 'models/StudentCourses.php';

// Get the courseId from the courses page
$id = $_POST['videoId'];

//check if id is set to prevent accidental errors
if (!isset($id))
{
    return header('location: '.Request::buildUri( '/courses'));
}

if (isset($_POST['courseSize']))
{
    $courseSize = $_POST['courseSize'];
}
else
{
    $courseSize = 0;
}

//Query from the database
$VIDEOS = new Videos($database);
$video = $VIDEOS->showOne($id);

$STUDENTCOURSES = new StudentCourses($database);

if (Auth::isAdmin() || Auth::isTeacher())
{
    $progress = $courseSize;
}
else
{
    //query from the database
    $progress = $STUDENTCOURSES->showOne($_SESSION['loggedInUser'], $video['categoryId'])['progress'];
}

$youtubeLink = explode('=', $video['youtubeLink']);
$videoUrl = 'https://youtube.com/embed/' . $youtubeLink[1] .'';



require 'views/courseDetails.view.php';