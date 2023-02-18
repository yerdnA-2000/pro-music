<?php

namespace core;

use core\interfaces\RouteInterface;

class Route implements RouteInterface
{
    private array $routes;

    public function __construct()
    {
        $this->routes = include(ROOT . '/config/routes.php');
    }

    public function getURI(): string
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        return $uri !== "" ? $uri : "/";
    }

    public function run() : void
    {
        $uri = $this->getURI();
        $result = false;

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $segments = explode('/', $path);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = array_shift($segments);
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;
                $controllerObject->$actionName();

                $result = true;
                break;
            }
        }
        if ($result === false) {
            self::notFoundHttp();
        }
    }

    protected static function notFoundHttp()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
        exit();
    }
}