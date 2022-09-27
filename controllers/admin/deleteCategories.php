<?php
require 'models/Categories.php';
$id = $_POST['categoryId'];
$idName = 'categoryId';

//check if the id has been set
if (!isset($id)) {
    return header('location: /admin/categories');
}
//set model en model description for the view
$CATEGORIES = new Categories($database);
$model = 'categories';
$modelName = 'categorie';
$modelDesc = 'deze categorie';

//select information about current category

$categories = $CATEGORIES->showOne($id);

//get data from query
$categoryName = 'Naam categorie: ' . $categories['name'];
$categoryDesc = 'Omschrijving categorie: ' . $categories['description'];

//check if the post variables have been set
if (isset($id) && isset($_POST['confirmDelete'])) {
    try {
        //execute query
        $CATEGORIES->destory($id);
        return header('location: /admin/categories');
    } catch (Exception $exception) {
        //show exception message
        die(var_dump($exception->getMessage()));
    }

}

require 'views/admin/deleteConfirm.view.php';

