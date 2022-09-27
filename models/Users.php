<?php

class Users
{

    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    //CREATE
    //Creates a user in the database
    public function create($name, $email, $pwd, $role)
    {
        try {
            //executes the query
            $query = $this->conn->query('INSERT INTO users SET name = ?, email=?, password=?, role=?, createdAt = NOW(), updatedAt = NOW()', [$name, $email, $pwd, $role]);

        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }



    //READ
    //Gets a specific user from the database by id
    public function showOne($id)
    {
        try {
            //executes the search query
            $query = $this->conn->query('SELECT * FROM users WHERE id = ?', [$id]);
            //returns the search query
            return $query['msg'][0];
            //catches an exception
        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //Get data from user based on his email
    public function getDataForEmail($email) {
        try {

            $query = $this->conn->query('SELECT * FROM users WHERE email = ?', [$email]);

            return $query['msg'][0];
        }
        catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //Gets all the users from the database
    public function showAll()
    {
        try {
            //executes the search query
            $query = $this->conn->query('SELECT * FROM users');
            //returns the search query
            return $query['msg'];
            //catches an exception
        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //check if a email exists (returns true/false)
    public function checkEmailExist($email) {
        try {
            $query = $this->conn->query('SELECT * FROM users WHERE email = ?', [$email]);

            if (!empty($query['msg'])) {
                return true;
            }
            else {
                return false;
            }
        }
        catch (Exception $e) {
            return false;
        }
    }
    //UPDATE
    //Updates a specific category in the database
    public function edit($name, $email, $role, $id)
    {
        try {
            //executes the update query
            $query = $this->conn->query('UPDATE users SET name = ?, email=?, role=?, updatedAt = NOW() WHERE id = ?', [$name, $email, $role, $id]);
        } //catches an exception
        catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //update the password
    public function editPassword($password, $id)
    {
        try {
            //executes the update query
            $query = $this->conn->query('UPDATE users SET password = ?, updatedAt = NOW() WHERE id = ?', [$password, $id]);
        } //catches an exception
        catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //update the active column
    public function activate($id)
    {
        try {
            //executes the update query
            $query = $this->conn->query('UPDATE users SET active = ?, updatedAt = NOW() WHERE id = ?', [true, $id]);
        } //catches an exception
        catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //DELETE
    //Deletes a user from the database
    public function destory($id)
    {
        try {
            //executes the update query
            $query = $this->conn->query('DELETE FROM users WHERE id = ?', [$id]);
        } //catches an exception
        catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }
}