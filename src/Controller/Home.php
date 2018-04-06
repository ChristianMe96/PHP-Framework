<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Check24Framework\ViewModel;
use Factory\Entry;

class Home implements ControllerInterface
{
    /**
     * @param Request $request
     * @param \PDO $pdo
     * @return ViewModel
     */
    public function action(Request $request)

    {
        $currentPage = $request->getFromQuery('page') ? $request->getFromQuery('page') : 0;
        $nextPage = $currentPage + 1;
        $limit = $currentPage * 3;

        $factoryEntry = Entry::create();
        $blogEntriesDB = $factoryEntry->getEntry($limit);
        $rowCount = $factoryEntry->getRowCount();


        if ($request->getFromQuery('Logout')) {
            unset($_SESSION['validity']);
        }

        if ($currentPage == ceil($rowCount / 3) - 1) {
            $lastPage = true;
        }

        foreach ($blogEntriesDB as $i => $entry) {
            $date = new \DateTime($entry['date']);
            $blogEntriesDB[$i]['date'] = $date->format("d.m.Y H:i:s");
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