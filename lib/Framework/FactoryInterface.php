<?php

namespace Check24Framework;



interface FactoryInterface
{
    public static function create(string $className, DiContainer $diContainer);
}
