<?php

ini_set("display_errors", "1");

$prefix = "";

session_set_cookie_params(60*30, "/".$prefix);

session_start();

//regenerate session to prevent Session fixation attacks
session_regenerate_id(true);

require 'core/bootstrap.php';

$database = new db_connection();
$router = new Routes();

require 'routes.php';

require $router->direct(
    Request::uri()
);