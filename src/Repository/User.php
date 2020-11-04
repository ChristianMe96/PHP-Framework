<?php
namespace Repository;

use PDO;

/**
 * Class User
 * @package Repository
 */
class User
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserWhereName(string $username) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetchObject(\Entity\User::class);
    }
}
