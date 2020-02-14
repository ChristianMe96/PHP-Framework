<?php
/**
 * Created by PhpStorm.
 * User: hami.yildiz
 * Date: 10.04.2018
 * Time: 10:48
 */

namespace Framework\Factory;



use Framework\DiContainer;
use Framework\FactoryInterface;

class Invokable implements FactoryInterface
{
    public static function create(string $className, DiContainer $diContainer) {
        return new $className();
    }
}