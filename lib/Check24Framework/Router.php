<?php

namespace Check24Framework;


class Router
{
    public function route(array $routes, array $server): string
    {
        $requestUri = $server['REQUEST_URI'];
        $requestQuery = $server['QUERY_STRING'];

        if (!empty($requestQuery)) {
            $requestUri = substr($requestUri, 0, strpos($requestUri, $requestQuery)-1);
        }

        if (isset($routes['routes'][$requestUri])) {
            return $routes['routes'][$requestUri];
        } else {
            throw new \Exception('');
        }
    }

}