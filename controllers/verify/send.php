<?php
//set the default return info
$email = "Unknown";
$header = "Error";

//insert the crosspage info
if (!empty($_SESSION["email"])) {
    $email = $_SESSION["email"];
    unset($_SESSION['email']);
}

//insert the crosspage info
if (!empty($_SESSION["crossPageData"])) {
    $header = $_SESSION["crossPageData"];
    unset($_SESSION["crossPageData"]);
}

require 'views/verify/send.view.php';