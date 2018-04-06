<?php

namespace Factory;

class User implements FactoryInterface
{
    /**
     * @return \Repository\User
     */
    public static function create()
    {
        return new \Repository\User(Pdo::create());
    }
}