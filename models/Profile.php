<?php

class Profile
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getProfileData($id)
    {
        //gets the global variable $database from index.php
        try {
            //executes the search query
            $query = $this->conn->query('SELECT email, name, isAdmin, createdAt FROM users WHERE id = ?',[$id]);
            //returns the search query
            return $query['msg'][0];
            //catches an exception
        } catch (Exception $e) {
            //return exception message
            return $e->getMessage();
        }

    }
    public function Editprofile($name, $id)

    {
        try {
            //executes the update query
            $query = $this->conn->query('UPDATE users SET name = ?, updatedAt = NOW() WHERE id = ?', [$name, $id]);
        } //catches an exception
        catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }
    public function EditPassword($password, $id)

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
    public function selectPassword($id)

    {
        try {
            //executes the update query
            return $this->conn->query('SELECT password FROM users WHERE id = ?',[$id]);
        } //catches an exception
        catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }
}