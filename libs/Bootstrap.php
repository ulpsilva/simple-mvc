<?php

class Bootstrap
{

    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "index";
        $url = rtrim($url, "/");
        $url = explode("/", $url);

        $controllerClass = $url[0] . "Controller";
        $controllerFile = "controllers/" . $controllerClass . ".php";
        if (file_exists($controllerFile)) {
            require $controllerFile;
        } else {
            require "controllers/errorController.php";
            $controller = new ErrorController();
            $controller->index();
            return;
        }
        $controller = new $controllerClass;

        if (isset($url[2]) && method_exists($controller, $url[1])) {
            $controller->{$url[1]}($url[2]);

        } else if (isset($url[1]) && method_exists($controller, $url[1])) {
            $controller->{$url[1]}();

        } else if (!isset($url[1]) && method_exists($controller, "index")) {
            $controller->index();
        } else {
            require "controllers/errorController.php";
            $controller = new ErrorController();
            $controller->index();
            return;
        }
    }
}