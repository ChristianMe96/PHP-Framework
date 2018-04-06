<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Factory\Comment;

class AddComment implements ControllerInterface
{
    public function action(Request $request)
    {
        $id = $request->getFromQuery('id');
        $name = $request->getFromPost('name');
        $mail = $request->getFromPost('mail');
        $url = $request->getFromPost('url');
        $text = $request->getFromPost('comment');
        $date = date('Y-m-d H:i:s');

        $comment = Comment::create();
        $comment->addComment($name, $id, $text, $date, $url, $mail);

        header('Location: /Details-Page?id='.$id, TRUE , 301);
        die();
    }
}