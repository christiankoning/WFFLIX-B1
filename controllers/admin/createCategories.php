<?php
require 'models/Categories.php';

if (!empty($_POST))
{
    try
    {
        //check if category name and category description are not empty
        if (!empty($_POST['categoryName']) && !empty($_POST['categoryDesc']))
        {
            $categoryName = $_POST['categoryName'];
            $categoryDesc = $_POST['categoryDesc'];
            //validate the category name
            if (!preg_match('/^[A-Za-z][A-Za-z0-9 - #+.]{1,31}$/', $categoryName))
            {
                //show error if the category name has less than 2 characters or more than 32 characters
                $error = "Naam van de categorie moet tussen de 2-32 karakters bevatten en naam van de categorie moet starten met een letter!";
            }
            //validate the category description
            else if (!preg_match('/^[A-Za-z0-9][A-Za-z0-9_ -#+.]{1,263}$/', $categoryDesc))
            {
                //show error if the category description has less than 2 characters or more than 264 characters
                $error = "Omschrijving van de categorie moet tussen de 2-264 karakters bevatten!";
            }
            else
            {
                $CATEGORIES = new Categories($database);
                $CATEGORIES->create($categoryName,$categoryDesc);
               return header('location: /admin/categories');
            }
        }
        //check which input is empty
        else
        {
            if(empty($categoryName))
            {
                //show error if username is empty
                $error = "Naam van de categorie mag niet leeg zijn!";
            }
            else if(empty($categoryDesc))
            {
                //show error if e-mail is empty
                $error = "Omschrijving van de categorie mag niet leeg zijn!";
            }
        }
    }
    catch (Exception $exception)
    {
        //show error message if an exception happens for debugging
        die(var_dump($exception->getMessage()));
    }
}

require 'views/admin/createCategories.view.php';