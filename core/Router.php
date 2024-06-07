<?php

namespace core;

class Router
{
    private $errorHandler;
    public function __construct(
        private readonly ErrorHandler $e)
    {
        $this->errorHandler = $e;
    }

    private $routes = [];
    public function addRoute(string $routeName, $routeLocation) {
        $this->routes[$routeName] = $routeLocation;
    }

    public function redirectToRoute($routeName) {
        if (array_key_exists($routeName,$this->routes)) {
            $location = 'location:' . $this->routes[$routeName];
            header($location);
        } else {
            $this->errorHandler->throwError("core\Router.php",0);
        }
    }
}