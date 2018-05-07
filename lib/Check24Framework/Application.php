<?php

namespace Check24Framework;

use Check24Framework\Exeption\RouteNotFound;

class Application
{
    private $events = [];

    public function init($config)
    {
        $frameworkConfig = include('config.php');
        $mergedConfig = array_merge_recursive($frameworkConfig, $config);
        $diContainer = new DiContainer($mergedConfig);

        $request = new Request($_GET, $_POST, $_FILES);
        /** @var Router $router */
        $router = $diContainer->get(Router::class);

        //todo: register all events
        $this->events = $config['events'];
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
        //Event Listener !!!
        foreach ($this->events[Event::PRERENDER] as $preEvent){
            $event = new $preEvent;
            $event->register($viewModel);
        }
        /** @var Renderer $renderer */
        $renderer = $diContainer->get(Renderer::class);
        $renderer->render($viewModel);
    }
}