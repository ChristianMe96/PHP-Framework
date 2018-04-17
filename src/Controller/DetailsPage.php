<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\DiContainer;
use Check24Framework\Request;
use Check24Framework\ViewModel;
use Factory\Comment;
use Factory\Entry;

/**
 * Class DetailsPage
 * @package Controller
 */
class DetailsPage implements ControllerInterface
{
    private $diContainer;

    public function __construct(DiContainer $diContainer)
    {
        $this->diContainer = $diContainer;
    }
    /**
     * @param Request $request
     * @return ViewModel
     */
    public function action(Request $request): ViewModel
    {
        $id = $request->getFromQuery('id');

        $entry = $this->diContainer->get('Repository\Entry');
        $entryById = $entry->getEntryById($id);

        $date = new \DateTime($entryById->getDate());
        $entryById->setDate($date->format("d.m.Y H:i:s"));

        $comments = $entryById->getComments();

        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/details-page/full-view.phtml');
        $viewModel->setTemplateVariables(['entry' => $entryById , 'comments' => $comments, 'id' => $id]);
        return $viewModel;
    }
}