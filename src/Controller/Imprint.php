<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 05.03.2018
 * Time: 12:01
 */

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\DiContainer;
use Check24Framework\Request;
use Check24Framework\ViewModel;

/**
 * Class Imprint
 * @package Controller
 */
class Imprint implements ControllerInterface
{
    /**
     * @param Request $request
     * @return ViewModel
     */
    public function action(Request $request): ViewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/layout/imprint.html');
        return $viewModel;
    }
}