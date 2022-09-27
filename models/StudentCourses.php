<?php

class StudentCourses
{

    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    //CREATE
    //insert new StudentCourse record into the database

    public function create($userId, $courseId)
    {
        try {
            //executes the query
            $query = $this->conn->query('INSERT INTO studentCourses SET studentID=?, courseId=?, createdAt = NOW(), updatedAt = NOW()', [$userId, $courseId]);

        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //READ
    public function show()
    {

    }

    //get one record of the shared key studentId, courseId
    public function showOne($studentId, $courseId)
    {
        try {
            //executes the search query
            $query = $this->conn->query('SELECT * FROM studentCourses WHERE studentId = ? AND courseId = ?', [$studentId, $courseId]);
            //returns the search query
            return $query['msg'][0];
            //catches an exception
        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    public function courseExist($studentId, $id)
    {
        try {
            //executes the search query
            $query = $this->conn->query('SELECT * FROM studentCourses WHERE studentId =? AND courseId =?', [$studentId, $id]);
            //returns the search query
            if (!empty($query['msg'])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //UPDATE
    public function edit($progress, $studentId, $courseId)
    {
        try {
            //executes the search query
            $query = $this->conn->query('UPDATE studentCourses SET progress = ?, updatedAt = NOW() WHERE studentId = ? AND courseId = ?', [$progress, $studentId, $courseId]);
            //catches an exception
        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //DELETE
    public function destory()
    {

    }
}

