<?php

namespace Factory;

use Check24Framework\DiContainer;
use Check24Framework\FactoryInterface;

/**
 * Class Pdo
 * @package Factory
 */
class Pdo implements FactoryInterface
{
    /**
     * @param string $className
     * @param DiContainer $diContainer
     * @return \PDO
     */
    public static function create(string $className, DiContainer $diContainer): \PDO
    {
        return new $className('mysql:host=localhost;dbname=blog', 'root', '');
    }
}