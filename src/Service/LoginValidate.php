<?php

namespace Service;


use Check24Framework\Request;
use Repository\User;


/**
 * Class CheckData
 * @package Login
 */
class LoginValidate
{

    private $userRepo;

    public function __construct(User $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function validate(string $username,string $password): bool {

        $user = $this->userRepo->getUserWhereName($username);
        if ($user !== false && password_verify($password, $user->getPassword())) {
            $_SESSION['userId'] = $user->getID();
            return true;
        }
        return false;
    }
}