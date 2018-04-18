<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Repository\Comment;

/**
 * Class AddComment
 * @package Controller
 */

class AddComment implements ControllerInterface
{
    private $commentRepo;

    public function __construct(Comment $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    /**
     * @param Request $request
     */
    public function action(Request $request): void
    {
        $id = $request->getFromQuery('id');

        $newComment = new \Entity\Comment();
        $newComment->setUser($request->getFromPost('name'));
        $newComment->setMail($request->getFromPost('mail'));
        $newComment->setUrl($request->getFromPost('url'));
        $newComment->setComment($request->getFromPost('comment'));
        $newComment->setDate(date('Y-m-d H:i:s'));

        $this->commentRepo->addComment($id, $newComment);

        header('Location: /Details-Page?id='.$id, TRUE , 301);
        die();
    }
}