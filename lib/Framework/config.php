<?php

return [
    'factories' => [
        \Framework\Renderer::class => \Framework\Factory\Invokable::class,
        \Framework\Router::class => \Framework\Factory\Invokable::class,
        \Framework\AbstractController::class => \Framework\Factory\Invokable::class
    ]
];