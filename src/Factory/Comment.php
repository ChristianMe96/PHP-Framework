<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 06.04.2018
 * Time: 10:50
 */

namespace Factory;


use Check24Framework\DiContainer;
use Check24Framework\FactoryInterface;
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
        return new \Repository\Comment($diContainer->get('PDO'));
    }
}