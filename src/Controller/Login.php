<?php

namespace Controller;


use Check24Framework\AbstractController;
use Check24Framework\Request;
use Check24Framework\ViewModel;
use Service\LoginValidate;

/**
 * Class Login
 * @package Controller
 */
class Login extends AbstractController
{
    private $checkData;

    public function __construct(LoginValidate $checkData)
    {
        $this->checkData = $checkData;
    }

    /**
     * @param Request $request
     * @return ViewModel
     */
    public function action(Request $request): ViewModel
    {

        if($request->getFromPost('login')){
            $username = $request->getFromPost('username');
            $password = $request->getFromPost('password');
            $idAndValidity = $this->checkData->validate($username, $password);
            $_SESSION['validity'] = $idAndValidity['validity'];
            $_SESSION['userId'] = $idAndValidity['ID'];
            if ($_SESSION['validity']){
                $this->redirectToRoute('/');
            }
            $errorMessage = 'Wrong Username or Password please try again!';
            $_SESSION['validity'];
        }
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/login/form.phtml');
        $viewModel->setTemplateVariables(['errorMessage' => !empty($errorMessage) ? $errorMessage :  ""]);
        $viewModel->setLayoutVariables(['validity' => !empty($_SESSION['validity']) ? $_SESSION['validity'] :  false]);
        return $viewModel;
    }
}