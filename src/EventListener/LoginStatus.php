<?php


namespace EventListener;


use Check24Framework\Event;
use Check24Framework\ViewModel;

class LoginStatus implements Event
{
    public function register(ViewModel $viewModel)
    {
        $viewModel->setLayoutVariables(['validity' => isset($_SESSION['validity']) ? $_SESSION['validity'] : null]);
        return $viewModel;
    }

    public function execute()
    {

    }
}