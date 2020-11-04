<?php


namespace EventListener;


use Framework\Event;
use Framework\Session;
use Framework\ViewModel;

class LoginStatus implements Event
{
    private Session $session;

    public function register(Session $session): void
    {
        $this->session = $session;
    }

    public function execute(ViewModel $viewModel): ViewModel
    {
        $viewModel->setLayoutVariables(['validity' => $this->session->getSessionVariable('validity')]);
        return $viewModel;
    }
}
