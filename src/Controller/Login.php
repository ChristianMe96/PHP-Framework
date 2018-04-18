<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Check24Framework\ViewModel;
use Service\LoginValidate;

/**
 * Class Login
 * @package Controller
 */
class Login implements ControllerInterface
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
            $_SESSION['validity'] = $this->checkData->validate($username, $password);
            if ($_SESSION['validity']){
                header('Location: /',TRUE, 301);
                die();
            }
            $errorMessage = 'Wrong Username or Password please try again!';
        }
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/login/form.phtml');
        $viewModel->setTemplateVariables(['errorMessage' => !empty($errorMessage) ? $errorMessage :  ""]);
        return $viewModel;
    }
}