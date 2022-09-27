<?php
require 'models/Videos.php';
require 'models/Categories.php';

//POST videoId gotten from the video overview page
$id = $_POST['videoId'];
//check if id is set to prevent accidental errors
if (!isset($id))
{
    return header('location: '.Request::buildUri( '/admin/videos'));
}
//Query to get the specific video
$VIDEOS = new Videos($database);
$video = $VIDEOS->showOne($id);

//data from the database
$videoTitle = $video['title'];
$videoDesc = $video['description'];
$videoLink = $video['youtubeLink'];
$categoryId = $video['categoryId'];


//array of categories
$CATEGORIES = new Categories($database);
$categories = $CATEGORIES->showAll();

//Check if the post data is from the form is empty (is default false because there are no post variables)
if (isset($_POST['videoTitle']) && isset($_POST['videoDescription']) && isset($_POST['videoLink']) && isset($_POST['videoCategory']) && isset($id)) {
    try {
        //Connecting post data to variables for easy adjustments
        $videoTitle = $_POST['videoTitle'];
        $videoDesc = $_POST['videoDescription'];
        $videoLink = $_POST['videoLink'];
        $categoryId = $_POST['videoCategory'];
        //Check if title, description and videolink are not empty
        if (!empty($videoTitle) && !empty($videoDesc) && !empty($videoLink)) {
            //validate the youtubelink
            if (!preg_match('/http(?:s?):\/\/(?:www\.)?youtu(?:be\.com\/watch\?v=|\.be\/)([\w\-\_]*)(&(amp;)?‌​[\w\?‌​=]*)?/', $videoLink)) {
                //show error if the youtube link is not valid
                $error = 'Youtube link is niet geldig!';
            } else {
                //execute query if all the statements are valid
                $VIDEOS->edit($videoTitle, $videoDesc, $categoryId, $videoLink, $id);
                //return to the video overview page
                return header('location: '.Request::buildUri( '/admin/videos'));
            }

            //check which input is empty
        } else {
            //show error if one is empty (videoTitle or videoDescription or VideoLink)
            if (empty($videoTitle)) {
                $error = 'De titel van de van mag niet leeg zijn!';
            } elseif (empty($videoDesc)) {
                $error = 'De omschrijving van de video mag niet leeg zijn!';
            }
            elseif (empty($videoLink)) {
                $error = 'De Youtubelink van de video mag niet leeg zijn!';
            }
        }

    } catch (Exception $exception) {
        //show error message if an exception happens for debugging
        die(var_dump($exception->getMessage()));
    }
}

//show view
require 'views/admin/updateVideos.view.php';
