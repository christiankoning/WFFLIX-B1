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
    public function create($name, $email, $pwd, $isAdmin)
    {
        try {
            //executes the query
            $query = $this->conn->query('INSERT INTO users SET name = ?, email=?, password=?, isAdmin=?, createdAt = NOW(), updatedAt = NOW()', [$name, $email, $pwd, $isAdmin]);

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

    //Gets a specific id from the database by email
    public function showOneId($email)
    {
        try {
            //executes the search query
            $query = $this->conn->query('SELECT id FROM users WHERE email = ?', [$email]);
            //returns the search query
            return $query['msg'][0];
            //catches an exception
        } catch (Exception $exception) {
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

    //UPDATE
    //Updates a specific category in the database
    public function edit($name, $email, $isAdmin, $id)
    {
        try {
            //executes the update query
            $query = $this->conn->query('UPDATE users SET name = ?, email=?, isAdmin=?, updatedAt = NOW() WHERE id = ?', [$name, $email, $isAdmin, $id]);
        } //catches an exception
        catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

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