<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 18.04.2018
 * Time: 09:12
 */

namespace Factory\Controller;


use Check24Framework\DiContainer;
use Check24Framework\FactoryInterface;
use Repository\Comment;

class AddComment implements FactoryInterface
{
    public static function create(string $className, DiContainer $diContainer)
    {
        return new $className($diContainer->get(Comment::class));
    }
}