<?php

namespace Framework;



interface FactoryInterface
{
    public static function create(string $className, DiContainer $diContainer);
}
