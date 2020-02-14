<?php


namespace EventListener;


use Framework\Event;
use Framework\Session;
use Framework\ViewModel;

class LoginStatus implements Event
{
    private $session;

    public function register(Session $session)
    {
        $this->session = $session;
    }

    public function execute(ViewModel $viewModel )
    {
        $viewModel->setLayoutVariables(['validity' => $this->session->getSessionVariable('validity')]);
        return $viewModel;
    }
}