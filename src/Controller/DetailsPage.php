<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\DiContainer;
use Check24Framework\Request;
use Check24Framework\ViewModel;
use Repository\Entry;


/**
 * Class DetailsPage
 * @package Controller
 */
class DetailsPage implements ControllerInterface
{
    private $entryRepo;

    public function __construct(Entry $entryRepo)
    {
        $this->entryRepo = $entryRepo;
    }
    /**
     * @param Request $request
     * @return ViewModel
     */
    public function action(Request $request): ViewModel
    {
        $id = $request->getFromQuery('id');

        $entryById = $this->entryRepo->getEntryById($id);

        $date = new \DateTime($entryById->getDate());
        $entryById->setDate($date->format("d.m.Y H:i:s"));

        $comments = $entryById->getComments();

        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/details-page/full-view.phtml');
        $viewModel->setTemplateVariables(['entry' => $entryById , 'comments' => $comments, 'id' => $id]);
        return $viewModel;
    }
}