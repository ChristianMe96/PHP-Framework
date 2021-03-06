<?php

namespace Factory\Repository;

use Framework\DiContainer;
use Framework\FactoryInterface;

/**
 * Class Entry
 * @package Factory
 */
class Entry implements FactoryInterface
{
    /**
     * @param string $className
     * @param DiContainer $diContainer
     * @return \Repository\EntryRepository
     */
    public static function create(string $className, DiContainer $diContainer): \Repository\EntryRepository
    {
       return new $className($diContainer->get(\PDO::class));
    }
}

