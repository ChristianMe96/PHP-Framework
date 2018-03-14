<?php

namespace Controller;


use AddEntry\Engine;
use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Check24Framework\ViewModel;

class AddEntry implements ControllerInterface
{
    public function action(Request $request)
    {




        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/add-entry/form.phtml');

        if ($request->getFromPost('postEntry')){
            try {
                $addEntryEngine = new Engine();
                $addEntryEngine->processBlogPost($request);
                header('Location: /', TRUE , 301);
            } catch (\Exception $e){
                $errorMessage = $e->getMessage();
            }
        }


        $viewModel->setTemplateVariables(['errorMessage' => !empty($errorMessage) ? $errorMessage :  ""]);
        return $viewModel;
    }
}