<?php
function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tda_test";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    return $conn;
}