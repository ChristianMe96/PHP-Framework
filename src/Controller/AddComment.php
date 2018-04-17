<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\DiContainer;
use Check24Framework\Request;
use Factory\Comment;

/**
 * Class AddComment
 * @package Controller
 */

class AddComment implements ControllerInterface
{
    private $diContainer;

    public function __construct(DiContainer $diContainer)
    {
        $this->diContainer = $diContainer;
    }

    /**
     * @param Request $request
     */
    public function action(Request $request): void
    {
        $id = $request->getFromQuery('id');
        $name = $request->getFromPost('name');
        $mail = $request->getFromPost('mail');
        $url = $request->getFromPost('url');
        $text = $request->getFromPost('comment');
        $date = date('Y-m-d H:i:s');

        $comment = $this->diContainer->get('Repository\Comment');
        $comment->addComment($name, $id, $text, $date, $url, $mail);

        header('Location: /Details-Page?id='.$id, TRUE , 301);
        die();
    }
}