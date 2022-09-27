<?php
class Categories
{

    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    //CREATE
    //Creates a category in the database
    public function create($name, $desc)
    {
        try{
            //executes the query
            $query = $this->conn->query('INSERT INTO categories SET name = ?, description=?, createdAt = NOW(), updatedAt = NOW()', [$name, $desc]);
        }
        catch (Exception $exception)
        {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //READ
    //Gets a specific category from the database
    public function showOne($id)
    {
        try {
            //executes the search query
            $query = $this->conn->query('SELECT * FROM categories WHERE id = ?', [$id]);
            //returns the search query
            return $query['msg'][0];
            //catches an exception
        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }
    //Gets all the categories from the database
    public function showAll()
    {
        try {
            //executes the search query
            $query = $this->conn->query('SELECT * FROM categories');
            //returns the search query
            return $query['msg'];
            //catches an exception
        } catch (Exception $exception)
        {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //UPDATE
    //Updates a specific category in the database
    public function edit($name, $desc, $id)
    {
        try {
            //executes the update query
            $query = $this->conn->query('UPDATE categories SET name = ?, description=?,  updatedAt = NOW() WHERE id = ?', [$name, $desc, $id]);
        }
            //catches an exception
        catch (Exception $exception)
        {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }
    //DELETE
    //Deletes a category from the database
    public function destory($id)
    {
        try {
            //executes the update query
            $query = $this->conn->query('DELETE FROM categories WHERE id = ?', [$id]);
        }
            //catches an exception
        catch (Exception $exception)
        {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }
}