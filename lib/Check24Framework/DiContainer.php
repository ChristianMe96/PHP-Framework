<?php

namespace Check24Framework;

class DiContainer
{
    private $instances = [];
    private $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function get($className)
    {
        if(isset($this->instances[$className])) {
            return $this->instances[$className];
        } else {
            return $this->createInstance($className);
        }
    }

    private function createInstance($className) {
        // todo: erstellen, speichern und zurückgeben
        $this->instances[$className] = $this->config['factories'][$className]::create($className, $this);
        return $this->instances[$className];
    }
}