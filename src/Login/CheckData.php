<?php

namespace Login;


use Check24Framework\DiContainer;
use Check24Framework\Exeption\WrongLoginData;
use Check24Framework\Request;
use Factory\User;

/**
 * Class CheckData
 * @package Login
 */
class CheckData
{
    /**
     * @var bool
     */
    private $loginStatus = false;
    private $diContainer;

    public function __construct(DiContainer $diContainer)
    {
        $this->diContainer = $diContainer;
    }

    /**
     * @param Request $request
     * @return bool
     * @throws WrongLoginData
     */
    public function validate(Request $request): bool {
        $username = $request->getFromPost('username');
        $password = $request->getFromPost('password');

        $userRepo = $this->diContainer->get('Repository\User');
        $user = $userRepo->getUserWhereName($username);

        if ($user !== false && password_verify($password, $user['password'])) {
            $_SESSION['userId'] = $user['ID'];
            $this->loginStatus = true;
        }else {
            throw new WrongLoginData('Wrong Username or Password!');
        }

        return $this->loginStatus;
    }
}