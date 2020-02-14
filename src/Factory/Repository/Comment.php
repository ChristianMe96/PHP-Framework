<?php

namespace Factory\Repository;


use Framework\DiContainer;
use Framework\FactoryInterface;
/**
 * Class Comment
 * @package Factory
 */
class Comment implements FactoryInterface
{
    /**
     * @param string $className
     * @param DiContainer $diContainer
     * @return \Repository\Comment
     */
    public static function create(string $className, DiContainer $diContainer): \Repository\Comment
    {
        return new \Repository\Comment($diContainer->get(\PDO::class));
    }
}