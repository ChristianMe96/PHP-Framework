<?php

namespace Framework;


interface Event
{
    const PRERENDER = 'prerender';
    const POSTRENDER = 'postrender';

    public function register(Session $session);

    public function execute(ViewModel $viewModel);
}