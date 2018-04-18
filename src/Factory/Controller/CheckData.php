<?php

namespace Factory\Controller;


use Check24Framework\DiContainer;
use Check24Framework\FactoryInterface;
use Repository\User;

class CheckData implements FactoryInterface
{
    public static function create(string $className, DiContainer $diContainer)
    {
        return new $className($diContainer->get(User::class));
    }
}