<?php

namespace Repository;


class User
{
    private $pdo;
    private $userWhereName;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserWhereName($username){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $this->userWhereName = $stmt->fetch();
        return $this->userWhereName;
    }
}