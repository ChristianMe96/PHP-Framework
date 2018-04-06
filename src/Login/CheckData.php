<?php

namespace Login;


use Check24Framework\Exeption\WrongLoginData;
use Check24Framework\Request;
use Factory\User;

class CheckData
{
    private $loginStatus = false;

    public function validate(Request $request, \PDO $pdo): bool {
        $username = $request->getFromPost('username');
        $password = $request->getFromPost('password');

        $userRepo = User::create();
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