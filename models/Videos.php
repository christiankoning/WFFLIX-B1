<?php
class Videos
{

    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    //CREATE
    //creates a video in the database
    public function create($title, $desc, $categoryId, $videoLink)
    {
        try {
            //executes the query
            $query = $this->conn->query('INSERT INTO videos SET title = ?, description=?, categoryId=?, youtubeLink=?, createdAt = NOW(), updatedAt = NOW()', [$title,$desc, $categoryId, $videoLink]);

        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //READ
    //Gets a specific video from the database
    public function showOne($id)
    {
        try {
            //executes the search query
            $query = $this->conn->query('SELECT * FROM videos WHERE id = ?', [$id]);
            //returns the search query
            return $query['msg'][0];
            //catches an exception
        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //Gets all the video from the database
    public function showAll()
    {
        try {
            //executes the search query
            $query = $this->conn->query('SELECT * FROM videos');
            //returns the search query
            return $query['msg'];
            //catches an exception
        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }


    //Gets all the video from the database from a sspecific course
    public function showAllFromCategory($categoryId)
    {
        try {
            //executes the search query
            $query = $this->conn->query('SELECT * FROM videos WHERE categoryId = ? ORDER BY updatedAt ', [$categoryId]);
            //returns the search query
            return $query['msg'];
            //catches an exception
        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    public function videoFromCategoryExist($categoryId)
    {
        try {
            //executes the search query
            $query = $this->conn->query('SELECT * FROM videos WHERE categoryId = ?', [$categoryId]);
            //returns the search query
            if (!empty($query['msg'])) {
                return true;
            }
            else {
                return false;
            }
            //catches an exception
        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //UPDATE
    //Updates a specific video in the database
    public function edit($title, $desc, $categoryId, $youtubeLink, $id)
    {
        try {
            //executes the update query
            $query = $this->conn->query('UPDATE videos SET title = ?, description=?, categoryId=?, youtubeLink=?, updatedAt = NOW() WHERE id = ?', [$title, $desc, $categoryId, $youtubeLink, $id]);
        } //catches an exception
        catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //DELETE
    //Deletes a video from the database;
    public function destory($id)
    {
        try {
            //executes the update query
            $query = $this->conn->query('DELETE FROM videos WHERE id = ?', [$id]);
        } //catches an exception
        catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }
}
