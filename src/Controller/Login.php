<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\Exeption\WrongLoginData;
use Check24Framework\Request;
use Check24Framework\ViewModel;
use Login\CheckData;

class Login implements ControllerInterface
{
    public function action(Request $request)
    {

        if($request->getFromPost('login')){
            try {
                $loginEngine = new CheckData();
                $_SESSION['validity'] = $loginEngine->validate($request);
                header('Location: /',TRUE, 301);
                die();
            } catch (WrongLoginData $e){
                $errorMessage =  $e->getMessage();
            }
        }
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/login/form.phtml');
        $viewModel->setTemplateVariables(['errorMessage' => !empty($errorMessage) ? $errorMessage :  ""]);
        return $viewModel;
    }
}