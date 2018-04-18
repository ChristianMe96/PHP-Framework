<?php

namespace Check24Framework;

class Application
{
    public function init($config)
    {
        $frameworkConfig = include('config.php');
        $mergedConfig = array_merge_recursive($frameworkConfig, $config);
        $diContainer = new DiContainer($mergedConfig);

        $request = new Request($_GET, $_POST, $_FILES);
        $router = $diContainer->get('Check24Framework\Router');
        try {
            $controllerClass = $router->route($mergedConfig, $_SERVER);
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