<?php

namespace Factory;


class Pdo implements FactoryInterface
{
    /**
     * @return \PDO
     */
    public static function create()
    {
        return new \PDO('mysql:host=localhost;dbname=blog', 'root', '');
    }
}