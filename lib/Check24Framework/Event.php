<?php

namespace Check24Framework;


interface Event
{
    const PRERENDER = 'prerender';
    const POSTRENDER = 'postrender';

    public function register(ViewModel $viewModel);

    public function execute();
}