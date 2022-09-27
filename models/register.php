<?php
class Register
{
    //creates a user from registration
    public static function createUser($name, $email, $hashPassword) {
        global $database;
        try {
            //Insert data into database
            $query = $database->query('INSERT INTO users (name, email, password) VALUES (?, ?, ?)', [$name, $email, $hashPassword]);
            return $query;
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //check if a email exists (returns true/false)
    public static function checkEmailExist($email) {
        global $database;
        try {
            $query = $database->query('SELECT * FROM users WHERE email = ?', [$email]);

            if (!empty($query['msg'])) {
                return true;
            }
            else {
                return false;
            }
        }
        catch (Exception $e) {
            return true;
        }
    }
}