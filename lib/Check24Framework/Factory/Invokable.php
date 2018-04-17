<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 10.04.2018
 * Time: 10:48
 */

namespace Check24Framework\Factory;



use Check24Framework\DiContainer;
use Check24Framework\FactoryInterface;

class Invokable implements FactoryInterface
{
    public static function create(string $className, DiContainer $diContainer) {
        return new $className();
    }
}