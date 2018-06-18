<?php


return [
    'routes' => [
        '/' => \Controller\Home::class,
        '/Login-Form' => \Controller\Login::class,
        '/Add-Entry' => \Controller\AddEntry::class,
        '/Impressum' => \Controller\Imprint::class,
        '/Details-Page' => \Controller\DetailsPage::class,
        '/Add-Comment' => \Controller\AddComment::class
    ],
    'factories' => [
        \Repository\Comment::class => \Factory\Repository\Comment::class,
        \Repository\User::class => \Factory\Repository\User::class,
        \Repository\Entry::class => \Factory\Repository\Entry::class,
        \PDO::class => \Factory\Pdo::class,
        \Controller\AddComment::class => \Factory\Controller\AddComment::class,
        \Controller\AddEntry::class => \Factory\Controller\AddEntry::class,
        \Controller\DetailsPage::class => \Factory\Controller\DetailsPage::class,
        \Controller\Home::class => \Factory\Controller\Home::class,
        \Controller\Imprint::class => \Check24Framework\Factory\Invokable::class,
        \Controller\Login::class => \Factory\Controller\Login::class,
        \Service\LoginValidate::class => \Factory\Controller\LoginValidate::class,
        \EventListener\LoginStatus::class => \Check24Framework\Factory\Invokable::class
    ],
    'events' => [
        \Check24Framework\Event::PRERENDER => [
            \EventListener\LoginStatus::class
        ],
        \Check24Framework\Event::POSTRENDER => [

        ]

    ]
];
