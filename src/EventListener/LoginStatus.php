<?php


namespace EventListener;


use Check24Framework\Event;
use Check24Framework\Session;
use Check24Framework\ViewModel;

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