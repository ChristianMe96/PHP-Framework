<?php

namespace Check24Framework;

class Application
{
    private $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }


    public function init()
    {
        $frameworkConfig = include('config.php');
        $this->config['factories']= array_merge($this->config['factories'],$frameworkConfig['factories']);
        $diContainer = new DiContainer($this->config);

        $request = new Request($_GET, $_POST, $_FILES);
        $router = $diContainer->get('Check24Framework\Router');
        try {
            $controllerClass = $router->route($this->config, $_SERVER);
        } catch (\Exception $exception) {
            header("HTTP/1.0 404 Not Found");
            include('../template/error/404.html');
            die();
        }
        $controller = $diContainer->get($controllerClass);
        $viewModel = $controller->action($request);
        $renderer = $diContainer->get('Check24Framework\Renderer');
        $renderer->render($viewModel);

    }
}