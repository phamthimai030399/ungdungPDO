<?php

class UserModel extends MyModel
{
    /**
     * @param $username
     * @param $password
     * @return array
     */
    public function checkLogin($username, $password): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE user_name = '$username' AND password = '$password'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $stmt->fetchAll();
        return $arr;
    }

    /**
     * @param $username
     * @param $userPassword
     * @return void
     */
    public function insertUser($username, $userPassword)
    {
        $sql = "INSERT INTO user (`user_name`, `password`)
  VALUES ('$username' , '$userPassword')";
        $this->conn->exec($sql);
    }
}