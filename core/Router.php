<?php

namespace Core;

/**
 * Class Router
 *
 * @namespace Core
 */
class Router
{
    /**
     * @var array $routes
     */
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * load
     *
     * @param $file
     *
     * @return Router
     */
    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    /**
     * get
     *
     * @param $uri
     * @param $controller
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * post
     *
     * @param $uri
     * @param $controller
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * direct
     *
     * @param $uri
     * @param $requestType
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        throw new \Exception('No route defined for this URI.');
    }

    /**
     * callAction
     *
     * @param $controller
     * @param $action
     *
     * @return mixed
     *
     * @throws \Exception
     */
    protected function callAction($controller, $action)
    {
        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            throw new \Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }

        return $controller->$action();
    }
}
