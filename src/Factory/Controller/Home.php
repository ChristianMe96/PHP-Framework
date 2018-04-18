<?php

namespace Factory\Controller;


use Check24Framework\DiContainer;
use Check24Framework\FactoryInterface;
use Repository\Entry;

class Home implements FactoryInterface
{
    public static function create(string $className, DiContainer $diContainer)
    {
        return new $className($diContainer->get(Entry::class));
    }
}