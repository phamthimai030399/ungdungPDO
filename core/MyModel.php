<?php
session_start();

class MyModel
{
    protected $conn;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tda_test";
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }

    /**
     * @return void
     */
    public function closeConnection()
    {
        $this->conn->close();
    }
}