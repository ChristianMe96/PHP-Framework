<?php

namespace Check24Framework;


abstract class AbstractController implements ControllerInterface
{
    private $routeConfig = [];

    /**
     * @return array
     */
    public function getRouteConfig(): array
    {
        return $this->routeConfig;
    }

    /**
     * @param array $routeConfig
     */
    public function setRouteConfig(array $routeConfig): void
    {
        $this->routeConfig = $routeConfig;
    }

    public function redirectTo($location)
    {
        header('Location: ' . $location, TRUE, 301);
        exit();
    }

    public function redirectToPath($path)
    {
        if (array_key_exists($path, $this->routeConfig)) {
            //ToDo Check if path exist in Config
            header('Location: ' . $path, TRUE, 301);
            exit();
        }
    }
}