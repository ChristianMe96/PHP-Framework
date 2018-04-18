<?php

namespace Factory\Controller;


use Check24Framework\DiContainer;
use Check24Framework\FactoryInterface;
use Service\LoginValidate;

class Login implements FactoryInterface
{
    public static function create(string $className, DiContainer $diContainer)
    {
        return new $className($diContainer->get(LoginValidate::class));
    }
}