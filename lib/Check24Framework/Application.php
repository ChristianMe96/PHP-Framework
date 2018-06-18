<?php

namespace Check24Framework;

use Check24Framework\Exeption\RouteNotFound;
use EventListener\LoginStatus;

class Application
{
    private $events = [];

    public function init($config)
    {
        $frameworkConfig = include('config.php');
        $mergedConfig = array_merge_recursive($frameworkConfig, $config);
        $diContainer = new DiContainer($mergedConfig);
        $session = new Session($_SESSION);
        //todo: register all events
        $this->events = $config['events'];
        //Register Prerender Events
        foreach ($this->events[Event::PRERENDER] as $preEventReg){
            $event = $diContainer->get($preEventReg);
            $event->register($session);
        }



        $request = new Request($_GET, $_POST, $_FILES);
        /** @var Router $router */
        $router = $diContainer->get(Router::class);


        try {
            $controllerClass = $router->route($mergedConfig, $_SERVER);
        } catch (RouteNotFound $e) {
            header('HTTP/1.0 404 Not Found');
            include('../template/error/404.html');
            exit();
        }


        $controller = $diContainer->get($controllerClass);
        $controller->setRouteConfig($config['routes']);
        $viewModel = $controller->action($request);
        //Execute Prerender Events
        foreach ($this->events[Event::PRERENDER] as $preEventExe){
            $event = $diContainer->get($preEventExe);
            $event->execute($viewModel);
        }
        /** @var Renderer $renderer */
        $renderer = $diContainer->get(Renderer::class);
        $renderer->render($viewModel);
    }
}