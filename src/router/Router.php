<?php
declare(strict_types=1);
namespace App\CTProject\router;

    class  Router
    {
        private mixed $_listRoute;
        private static ?Router $_instance= null;
        private function __construct()
        {
            $stringRoute = file_get_contents('./../config/routes.json');
            $this->_listRoute = json_decode($stringRoute);
        }
        public static function getInstance()
        {
            if (self::$_instance == null)
                self::$_instance= new Router();
            return self::$_instance;
        }
        private function _buildParamsPattern(\stdClass $route):string
        {
            $patternParams="";
            foreach($route->params as $params)
            {
                if ($params->type =="integer")
                    $patternParams.='/\d';
                else
                    $patternParams.='/(.*?)';
            }
            return $patternParams;
        }
        public function findRoute(HttpRequest $httpRequest):Route
        {
    
            $routeFound = array_filter($this->_listRoute,function($route) use ($httpRequest){

                $expression = "#^" . $route->path .$this->_buildParamsPattern($route)."$#";
                return preg_match($expression, $httpRequest->getUri()) && $route->method == $httpRequest->getMethod();
            });
            $numberRoute = count($routeFound);
            if($numberRoute > 1)
            {
                throw new MultipleRouteFoundException();
            }
            else if($numberRoute == 0)
            {
                throw new NoRouteFoundException();
            }
            else
            {
                return new Route(array_shift($routeFound)); 
            }
        }


    }