<?php

namespace Factory\Controller;


use Framework\DiContainer;
use Framework\FactoryInterface;
use Service\LoginValidate;

class Login implements FactoryInterface
{
    public static function create(string $className, DiContainer $diContainer)
    {
        return new $className($diContainer->get(LoginValidate::class));
    }
}