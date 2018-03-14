<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 05.03.2018
 * Time: 12:01
 */

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Check24Framework\ViewModel;

class Impressum implements ControllerInterface
{
    public function action(Request $request)
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/layout/impressum.html');
        return $viewModel;
    }
}