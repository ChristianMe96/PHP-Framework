<?php

namespace Factory;


class Entry implements FactoryInterface
{
    /**
     * @return \Repository\Entry
     */
    public static function create()
    {
       /*
       $pdo = PdoFactory::create();
       $stmt = $pdo->prepare();
       $stmt->fetchObject();
       */
       return new \Repository\Entry(Pdo::create());
    }
}

