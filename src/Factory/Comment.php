<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 06.04.2018
 * Time: 10:50
 */

namespace Factory;


class Comment implements FactoryInterface
{
    /**
     * @return \Repository\Comment
     */
    public static function create()
    {
        return new \Repository\Comment(Pdo::create());
    }
}