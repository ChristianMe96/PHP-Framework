<?php

namespace Service;


use Framework\Request;
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
     * @return array
     */
    public function validate(string $username,string $password): array {

        $user = $this->userRepo->getUserWhereName($username);
        if ($user !== false && password_verify($password, $user->getPassword())) {
            return [
                'validity' => true,
                'ID' => $user->getID()
            ];
        }
        return [
            'validity' => false,
            'ID' => null
        ];
    }
}