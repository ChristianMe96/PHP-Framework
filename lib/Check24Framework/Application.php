<?php

namespace Check24Framework;

class Application
{
    public function init()
    {

        $request = new Request($_GET, $_POST, $_FILES);
        $router = new Router();

        try {
            $controllerClass = $router->route(include('../src/config/config.php'), $_SERVER);
        } catch (\Exception $exception) {
            header("HTTP/1.0 404 Not Found");
            include('../template/error/404.html');
            die();
        }

        $controller = new $controllerClass;
        $viewModel = $controller->action($request);
        $renderer = new Renderer();
        $renderer->render($viewModel);

    }
}