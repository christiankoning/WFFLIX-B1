<?php
require 'models/Categories.php';
require 'models/Videos.php';

$CATEGORIES = new Categories($database);
if($categories = $CATEGORIES->showAll()) {
    if (sizeof($categories) > 0) {
        $noCategories = false;
    }
    else{
        $noCategories = true;
    }

}

if (!empty($_POST))
{
    try
    {
        //check if video title, video description and video link are not empty
        if (!empty($_POST['videoName']) && !empty($_POST['videoDesc']) && !empty($_POST['videoLink']))
        {
            $videoTitle = $_POST['videoName'];
            $videoDesc = $_POST['videoDesc'];
            $videoLink = $_POST['videoLink'];
            $categoryId = $_POST['categoryId'];
            //validate the video title
            if (!preg_match('/^[A-Za-z0-9][A-Za-z0-9\s]{1,31}$/', $videoTitle))
            {
                //show error if the video name has less than 2 characters or more than 32 characters
                $error = "Titel van de video moet tussen de 2-32 karakters bevatten!";
            }
            //validate the video description
            else if (!preg_match('/^[A-Za-z0-9][A-Za-z0-9_ -]{1,263}$/', $videoDesc))
            {
                //show error if the video description has less than 2 characters or more than 264 characters
                $error = "Omschrijving van de video moet tussen de 2-264 karakters bevatten!";
            }
            //validate video link
            else if (!preg_match('/((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?/', $videoLink))
            {
                //show error if the video link is incorrect
                $error = "Incorrecte video link!";
            }
            else
            {
                //execute query
                $VIDEOS = new Videos($database);
                $VIDEOS->create($videoTitle, $videoDesc, $categoryId, $videoLink);
                return header('location: /admin/videos');
            }
        }
        //check which input is empty
        else
        {
            if(empty($_POST['videoName']))
            {
                //show error if username is empty
                $error = "Titel van de video mag niet leeg zijn!";
            }
            else if(empty($_POST['videoDesc']))
            {
                //show error if e-mail is empty
                $error = "Omschrijving van de video mag niet leeg zijn!";
            }
            else if(empty($_POST['videoLink']))
            {
                //show error if e-mail is empty
                $error = "Youtubelink van de video mag niet leeg zijn!";
            }
        }
    }
    catch (Exception $exception)
    {
        //show error message if an exception happens for debugging
        die(var_dump($exception->getMessage()));
    }
}

require 'views/admin/createVideos.view.php';