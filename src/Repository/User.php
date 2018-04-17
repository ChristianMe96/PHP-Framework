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
    private $userWhereName;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getUserWhereName($username){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $this->userWhereName = $stmt->fetch();
        return $this->userWhereName;
    }
}