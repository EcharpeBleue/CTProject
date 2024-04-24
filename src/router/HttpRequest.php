<?php

declare(strict_types=1);
namespace app\CTProject\router;

    class HttpRequest
    {
        private string $_uri;
        private string $_method;
        private ?array $_params;
        private ?Route $_route;
        
        public function __construct()
        {
            $this->_uri =$_SERVER['REQUEST_URI'];
            $this->_method = $_SERVER['REQUEST_METHOD'];
            $this->_params = null;
            $this->_route = null;
        }
        
        public function getUri():string
        {
            return $this->_uri; 
        }
        
        public function getMethod():string
        {
            return $this->_method;  
        }
        
        public function getParams():array
        {
            return $this->_params;  
        }
        public function setRoute(Route $route)
        {
            $this->_route = $route; 
        
        }
        public function getRoute():Route
        {
            return $this->_route;   
        } 
        private function bindParamFromPost():array
        {
            $params = array();
            foreach($this->_route->getParams() as $param)
                    {
                        if(isset($_POST[$param]))
                            {
                                $params[] = $_POST[$param];
                            }
                    }
            return $params;
        }
        private function bindParamFromGet():array
        {
            $route=explode('/',$this->_route->getPath());
            $uri = explode('/',$this->_uri);
            $nbParams=count($uri)-count($route);
            $valeursParams = array_slice($uri,count($route),$nbParams);
            $params = array();
            for ($i =0;$i<$nbParams;$i++)
            {
                if ($this->getRoute()->getParams()[$i]->type== "integer")
                    $params[$this->getRoute()->getParams()[$i]->name] =(int) $valeursParams[$i];   
                else
                $params[$this->getRoute()->getParams()[$i]->name] = $valeursParams[$i];   
           
            }

            return $params;
        }
        public function bindParam():void
        {
            switch($this->_method)
            {
                case "GET":
                    $this->_params=$this->bindParamFromGet();
                    break;
                case "POST":
                    $this->_params=$this->bindParamFromPost();
                    break;
            }
        }
        public function run()
        {
            if ($this->_route == null)
                throw new RouteNotSetException($this);
            $this->_route->run($this);
        }

       
    }