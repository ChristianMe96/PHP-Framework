<?php

namespace Framework;


class ViewModel
{

    private $currentPath = null;
    private $TemplateVariables = [];
    private $layoutVariables = [];

    /**
     * @return null
     */
    public function getCurrentPath()
    {
        return $this->currentPath;
    }

    /**
     * @param null $currentPath
     */
    public function setCurrentPath($currentPath): void
    {
        $this->currentPath = $currentPath;
    }

    /**
     * @return array
     */
    public function getLayoutVariables(): array
    {
        return $this->layoutVariables;
    }

    /**
     * @param array $layoutVariables
     */
    public function setLayoutVariables(array $layoutVariables): void
    {
        $this->layoutVariables = $layoutVariables;
    }

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