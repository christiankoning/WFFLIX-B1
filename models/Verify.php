<?php

class Verify
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    //CREATE
    //Creates a verify code in the database
    public function create($userId, $code, $type)
    {
        try {
            //executes the query
            $query = $this->conn->query('INSERT INTO verify SET userId = ?, verifyCode = ?, type = ?, createdAt = NOW(), updatedAt = NOW()', [$userId, $code, $type]);

        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //UPDATE
    //Updates a verify code in the database
    public function edit($id, $code, $type) {
        try {
            //executes the query
            $query = $this->conn->query('UPDATE verify SET verifyCode = ?, type = ?, updatedAt = NOW() WHERE id = ?', [$code, $type, $id]);

        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //READ
    //Gets a verify code from the database
    public function show($email) {
        try {
            //executes the query
            $query = $this->conn->query('SELECT verify.verifyCode, verify.userId, verify.id, verify.type FROM verify LEFT JOIN users ON users.id=verify.userId WHERE email = ? ', [$email]);

            return $query;

        } catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

    //DELETE
    //Deletes a verifycode from the database
    public function destory($id)
    {
        try {
            //executes the update query
            $query = $this->conn->query('DELETE FROM verify WHERE id = ?', [$id]);
        } //catches an exception
        catch (Exception $exception) {
            //return exception message
            die(var_dump($exception->getMessage()));
        }
    }

}