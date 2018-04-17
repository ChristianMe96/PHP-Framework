<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 17.04.2018
 * Time: 09:37
 */

namespace Factory;


use Check24Framework\DiContainer;
use Check24Framework\FactoryInterface;

class Controller
{
    public static function create(string $className, DiContainer $diContainer)
    {
        return new $className($diContainer);
    }
}