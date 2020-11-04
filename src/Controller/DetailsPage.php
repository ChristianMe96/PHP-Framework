<?php

namespace Controller;


use Framework\AbstractController;
use Framework\Request;
use Framework\ViewModel;
use Repository\EntryRepository;


/**
 * Class DetailsPage
 * @package Controller
 */
class DetailsPage extends AbstractController
{
    private $entryRepo;

    public function __construct(EntryRepository $entryRepo)
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
