<?php

namespace Factory\Controller;


use Framework\DiContainer;
use Framework\FactoryInterface;
use Repository\User;

class LoginValidate implements FactoryInterface
{
    public static function create(string $className, DiContainer $diContainer)
    {
        return new $className($diContainer->get(User::class));
    }
}