<?php

namespace Check24Framework;


class ViewModel
{

    private $currentPath = null;
    private $TemplateVariables = [];

    public function setTemplate($path) : void
    {
        $this->currentPath = $path;

    }

    public function setTemplateVariables($variable): void
    {
        $this->TemplateVariables = $variable;
    }
    /**
     * @return string
     */
    public function renderTemplate():string
    {
        extract($this->TemplateVariables);
        ob_start();
        include($this->currentPath);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    /**
     * @return string
     */
    public function __toString():string 
    {
        return $this->renderTemplate();
    }

}