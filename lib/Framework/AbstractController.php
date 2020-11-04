<?php

namespace Framework;


abstract class AbstractController implements ControllerInterface
{
    private array $routeConfig = [];

    public function getRouteConfig(): array
    {
        return $this->routeConfig;
    }

    public function setRouteConfig(array $routeConfig): void
    {
        $this->routeConfig = $routeConfig;
    }

    public function redirectTo($location): void
    {
        header('Location: ' . $location, TRUE, 301);
        exit();
    }

    public function redirectToRoute($route): void
    {
        if (array_key_exists($route, $this->routeConfig)) {
            //ToDo Check if path exist in Config
            header('Location: ' . $route, TRUE, 301);
            exit();
        }
    }
}
