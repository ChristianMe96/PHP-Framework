<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 18.04.2018
 * Time: 08:59
 */

namespace Factory\Controller;


use Framework\DiContainer;
use Framework\FactoryInterface;
use Repository\Entry;

class AddEntry implements FactoryInterface
{
    public static function create(string $className, DiContainer $diContainer)
    {
        return new $className($diContainer->get(Entry::class));
    }
}