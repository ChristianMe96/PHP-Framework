<?php

namespace LoginForm;


use Check24Framework\Exeption\WrongLoginData;
use Check24Framework\Request;

class Engine
{
    private $loginStatus = false;

    public function validate(Request $request): bool {
        $mysql = new \mysqli('localhost', 'root', '', 'blog');
        $username = $request->getFromPost('username');
        $password = $request->getFromPost('password');
        $query = $mysql->query("SELECT * FROM users WHERE username = '$username'");
        $user = $query->fetch_assoc();

        if ($user !== false && password_verify($password, $user['password'])) {
            $_SESSION['userId'] = $user['ID'];
            $this->loginStatus = true;
        }else {
            throw new WrongLoginData('Wrong Username or Password!');
        }

        return $this->loginStatus;
    }
}