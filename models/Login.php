<?php

class Login
{
    //Get data from user based on his email
    public static function getDataForEmail($email) {
        global $database;
        try {

            $query = $database->query('SELECT * FROM users WHERE email = ?', [$email]);

            return $query;
        }
        catch (Exception $e) {
            return true;
        }
    }

}