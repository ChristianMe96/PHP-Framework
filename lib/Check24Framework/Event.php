<?php

namespace Check24Framework;


interface Event
{
    const PRERENDER = 'prerender';
    const POSTRENDER = 'postrender';

    public function register(Session $session);

    public function execute(ViewModel $viewModel);
}