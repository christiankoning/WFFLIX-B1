<?php
session_start();

require 'core/bootstrap.php';

$database = new db_connection();
$router = new Routes();

require 'routes.php';

require $router->direct(
    Request::uri()
);

