<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Check24Framework\ViewModel;
use Factory\Comment;
use Factory\Entry;

class DetailsPage implements ControllerInterface
{
    public function action(Request $request)
    {
        $id = $request->getFromQuery('id');

        $entry = Entry::create();
        $entryById = $entry->getEntryById($id);

        $date = new \DateTime($entryById['date']);
        $entryById['date'] = $date->format("d.m.Y H:i:s");

        $comment = Comment::create();
        $commentsByEntryId = $comment->getCommentsByEntryId($id);

        if (!$commentsByEntryId) {
            $commentsByEntryId = [];
        }
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/details-page/full-view.phtml');
        $viewModel->setTemplateVariables(['entry' => $entryById , 'comments' => $commentsByEntryId, 'id' => $id]);
        return $viewModel;
    }
}