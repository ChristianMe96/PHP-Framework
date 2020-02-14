<?php

namespace Controller;


use Framework\AbstractController;
use Framework\ControllerInterface;
use Framework\Request;
use Framework\ViewModel;
use Repository\Entry;


/**
 * Class AddEntry
 * @package Controller
 */
class AddEntry extends AbstractController
{
    /**
     * @var Entry
     */
    private $entryRepo;

    public function __construct(Entry $entryRepo)
    {
        $this->entryRepo = $entryRepo;
    }
    /**
     * @param Request $request
     * @return ViewModel
     */
    public function action(Request $request): ViewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/add-entry/form.phtml');

        if ($request->getFromPost('postEntry')){
            try {
                $newEntry = new \Entity\Entry();
                $newEntry->setDate(date('Y-m-d H:i:s'));
                $newEntry->setTitle($request->getFromPost('Title'));
                $newEntry->setContent($request->getFromPost('Text'));
                $authorId = $_SESSION['userId'];
                $this->entryRepo->addEntry($authorId, $newEntry);
                $this->redirectToRoute('/');
            } catch (\Exception $e){
                $errorMessage = $e->getMessage();
            }
        }


        $viewModel->setTemplateVariables(['errorMessage' => !empty($errorMessage) ? $errorMessage :  ""]);
        return $viewModel;
    }
}