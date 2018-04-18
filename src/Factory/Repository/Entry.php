<?php

namespace Factory\Repository;

use Check24Framework\DiContainer;
use Check24Framework\FactoryInterface;

/**
 * Class Entry
 * @package Factory
 */
class Entry implements FactoryInterface
{
    /**
     * @param string $className
     * @param DiContainer $diContainer
     * @return \Repository\Entry
     */
    public static function create(string $className, DiContainer $diContainer): \Repository\Entry
    {
       return new $className($diContainer->get(\PDO::class));
    }
}

