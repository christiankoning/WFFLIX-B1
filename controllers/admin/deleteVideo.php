<?php
$id = $_POST['videoId'];
$idName = 'videoId';

//check if the id has been set
if (!isset($id)) {
    return header('location: '.Request::buildUri( '/admin/videos'));
}
//set model en model description for the view
$model = 'videos';
$modelName = 'video';
$modelDesc = 'deze video';

//select information about current video
$VIDEOS = new Videos($database);
$videos= $VIDEOS->showOne($id);

//get data from query
$videoTitle = 'Video titel: ' . $videos['title'];
$videoDesc = 'Omschrijving: ' . $videos['description'];
$videoLink = 'Youtube link: ' . $videos['youtubeLink'];

//check if the post variables have been set
if (isset($id) && isset($_POST['confirmDelete'])) {
    try {
        //execute query
        $VIDEOS->destory($id);
        return header('location: '.Request::buildUri( '/admin/videos'));
    } catch (Exception $exception) {
        //show exception message
        die(var_dump($exception->getMessage()));
    }

}

require 'views/admin/deleteConfirm.view.php';