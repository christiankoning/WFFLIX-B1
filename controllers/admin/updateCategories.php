<?php
require 'models/Categories.php';
//POST userId gotten from the overview page
$id = $_POST['categoryId'];
//check if id is set to prevent accidental errors
if (!isset($id)) {
    return header('location: /admin/categories');
}
$CATEGORIES = new Categories($database);
//Query from the database
$category = $CATEGORIES->showOne($id);

//data from the database
$categoryName = $category['name'];
$categoryDesc = $category['description'];


//Check if the form data excist (only the id exisist at the start)
if (isset($id) && isset($_POST['categoryName']) && isset($_POST['categoryDescription'])) {
    try {
        //Connecting post data to variables for easy adjustments
        $categoryName = $_POST['categoryName'];
        $categoryDesc = $_POST['categoryDescription'];
        //Check if category name and category description are not empty
        if (!empty($categoryName) && !empty($categoryDesc)) {
            //execute query if all the statements are valid
            $CATEGORIES->edit($categoryName, $categoryDesc, $id);
            //return to the overview page
            return header('location: /admin/categories');
            //check which input is empty
        } else {
            //show error if one or both are empty (categoryName and categoryDescription)
            if (empty($categoryName)) {
                $error = 'De naam van de cateogorie mag niet leeg zijn!';
            } elseif (empty($categoryDesc)) {
                $error = 'De omschrijving van de categorie mag niet leeg zijn!';
            }
        }

    } catch (Exception $exception) {
        //show error message if an exception happens for debugging
        die(var_dump($exception->getMessage()));
    }
}
//show view
require 'views/admin/updateCategories.view.php';