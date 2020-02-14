<?php

namespace Factory\Repository;

use Framework\DiContainer;
use Framework\FactoryInterface;

/**
 * Class User
 * @package Factory
 */
class User implements FactoryInterface
{
    /**
     * @param string $className
     * @param DiContainer $diContainer
     * @return \Repository\User
     */
    public static function create(string $className, DiContainer $diContainer): \Repository\User
    {
        return new \Repository\User($diContainer->get(\PDO::class));
    }
}