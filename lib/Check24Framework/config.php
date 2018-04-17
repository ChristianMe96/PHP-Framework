<?php

return [
    'factories' => [
        \Check24Framework\Renderer::class => \Check24Framework\Factory\Invokable::class,
        \Check24Framework\Router::class => \Check24Framework\Factory\Invokable::class,
        \Check24Framework\Request::class => \Check24Framework\Factory\Invokable::class,
        \Check24Framework\ViewModel::class => \Check24Framework\Factory\Invokable::class
    ]
];