<?php

namespace Framework;


use Framework\Exeption\RouteNotFound;

class Router
{
    public function route(array $routes, array $server): string
    {
        $requestUri = $server['REQUEST_URI'];

        if (!empty($server['QUERY_STRING'])) {
            $requestQuery = $server['QUERY_STRING'];
            $requestUri = substr($requestUri, 0, strpos($requestUri, $requestQuery)-1);
        }

        if (isset($routes['routes'][$requestUri])) {
            return $routes['routes'][$requestUri];
        }

        throw new RouteNotFound('');
    }

}
