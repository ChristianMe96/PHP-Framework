<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\DiContainer;
use Check24Framework\Request;
use Check24Framework\ViewModel;
use Repository\Entry;

/**
 * Class Home
 * @package Controller
 */
class Home implements ControllerInterface
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
        $currentPage = $request->getFromQuery('page') ? $request->getFromQuery('page') : 0;
        $nextPage = $currentPage + 1;
        $limit = $currentPage * 3;


        $blogEntriesDB = $this->entryRepo->getEntry($limit);
        $rowCount = $this->entryRepo->getRowCount();


        if ($request->getFromQuery('Logout')) {
            unset($_SESSION['validity']);
        }

        if ($currentPage == ceil($rowCount->getEntryCount() / 3) - 1) {
            $lastPage = true;
        }

        foreach ($blogEntriesDB as $i => $entry) {
            $date = new \DateTime($entry->getDate());
            $blogEntriesDB[$i]->setDate($date->format("d.m.Y H:i:s"));
        }

        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/home/welcome-page.phtml');
        $viewModel->setTemplateVariables([
            'blogEntries' => $blogEntriesDB,
            'lastPage' => !empty($lastPage) ? $lastPage : '',
            'nextPage' => $nextPage,
        ]);
        return $viewModel;
    }
}