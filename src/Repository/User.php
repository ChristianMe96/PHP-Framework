<?php
namespace Repository;

/**
 * Class User
 * @package Repository
 */
class User
{
    /**
     * @var
     */
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getUserWhereName($username): \Entity\User {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $userWhereName = $stmt->fetchObject(\Entity\User::class);
        return $userWhereName;
    }
}