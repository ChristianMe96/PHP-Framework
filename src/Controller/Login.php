<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\DiContainer;
use Check24Framework\Exeption\WrongLoginData;
use Check24Framework\Request;
use Check24Framework\ViewModel;
use Login\CheckData;

/**
 * Class Login
 * @package Controller
 */
class Login implements ControllerInterface
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

        if($request->getFromPost('login')){
            try {
                $loginEngine = $this->diContainer->get('Login\CheckData');
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