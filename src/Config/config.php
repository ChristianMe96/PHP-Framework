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
        // todo: framework und projekt configs voneinander trennen
        \Repository\Comment::class => \Factory\Comment::class,
        \Repository\User::class => \Factory\User::class,
        \Repository\Entry::class => \Factory\Entry::class,
        \PDO::class => \Factory\Pdo::class,
        Controller\AddComment::class => \Factory\Controller::class,
        \Controller\AddEntry::class => \Factory\Controller::class,
        \Controller\DetailsPage::class => \Factory\Controller::class,
        \Controller\Home::class => \Factory\Controller::class,
        \Controller\Imprint::class => \Factory\Controller::class,
        \Controller\Login::class => \Factory\Controller::class,
        \Login\CheckData::class => \Factory\Controller::class,
        \AddEntry\InsertToDB::class => \Factory\Controller::class

        // todo: tbd
    ],
];
// todo config erweitern für di-configuration