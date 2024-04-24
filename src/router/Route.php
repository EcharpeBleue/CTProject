<?php
declare(strict_types=1);
namespace App\CTProject\router;


class Route
{
    private string $_path;
    private string $_controller;
    private string $_action;
    private string $_method;
    private array $_params;

    public function __construct(\stdClass $route)
    {
        $this->_path = $route->path;
        $this->_controller = $route->controller;
        $this->_action = $route->action;
        $this->_method = $route->method;
        $this->_params = $route->params;
    }
    public function getPath():string
    {
        return $this->_path;
    }
    public function getController():string
    {
        return $this->_controller;
    }
    public function getAction():string
    {
        return $this->_action;
    }
    public function getMethod():string
    {
        return $this->_method;
    }
    public function getParams():array
    {
        return $this->_params;
    }
    public function run(HttpRequest $httpRequest)
    {
        $controller = null;
        $controllerName = "app\CTProject\controller\\".$this->_controller . "Controller";
        if (class_exists($controllerName)) {
            $controller = new $controllerName($httpRequest);
            var_dump($controllerName);
            if (method_exists($controller, $this->_action)) {
                $controller->{$this->_action}(...$httpRequest->getParams());
            } else {
                throw new ActionNotFoundException();
            }
        } else {
            throw new ControllerNotFoundException();
        }
    }

}