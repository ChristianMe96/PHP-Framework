<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 05.03.2018
 * Time: 12:01
 */

namespace Controller;


use Framework\AbstractController;
use Framework\Request;
use Framework\ViewModel;

/**
 * Class Imprint
 * @package Controller
 */
class Imprint extends AbstractController
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