<?php
namespace Check24Framework;


class Renderer
{
    public function render(ViewModel $viewModel)
    {
        $layoutTemplate = new ViewModel();
        $layoutTemplate->setTemplate('../template/layout/body.phtml');
        $layoutTemplate->setTemplateVariables(['templateOutput'=>$viewModel->renderTemplate()]);
        echo $layoutTemplate;
    }
}