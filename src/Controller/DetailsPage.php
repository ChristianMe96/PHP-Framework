<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Check24Framework\ViewModel;

class DetailsPage implements ControllerInterface
{
    public function action(Request $request)
    {
        $mysql = new \mysqli('localhost', 'root', '', 'blog');
        $id = $request->getFromQuery('id');
        $query = $mysql->query("SELECT * FROM entries WHERE  ID = '$id'");
        $entry = $query->fetch_assoc();
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/details-page/full-view.phtml');
        $viewModel->setTemplateVariables(['entry' => $entry]);
        return $viewModel;
    }
}