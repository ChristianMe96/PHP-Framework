<?php

namespace Controller;


use AddEntry\InsertToDB;
use Check24Framework\ControllerInterface;
use Check24Framework\DiContainer;
use Check24Framework\Request;
use Check24Framework\ViewModel;


/**
 * Class AddEntry
 * @package Controller
 */
class AddEntry implements ControllerInterface
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
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/add-entry/form.phtml');

        if ($request->getFromPost('postEntry')){
            try {
                $addEntryEngine = $this->diContainer->get('AddEntry\InsertToDB');
                $addEntryEngine->processBlogPost($request);
                header('Location: /', TRUE , 301);
                die();
            } catch (\Exception $e){
                $errorMessage = $e->getMessage();
            }
        }


        $viewModel->setTemplateVariables(['errorMessage' => !empty($errorMessage) ? $errorMessage :  ""]);
        return $viewModel;
    }
}