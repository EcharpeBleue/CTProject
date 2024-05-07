<?php
declare(strict_types=1);
require_once dirname(__DIR__) .'/vendor/autoload.php';
use app\CTProject\router\HttpRequest;
use app\CTProject\router\Router;
try
{
   $httpRequest = new HttpRequest();
   $route = Router::getInstance()->findRoute($httpRequest);
   $httpRequest->setRoute($route);
   $httpRequest->bindParam();
   $httpRequest->run();
}
catch(Exception $e)
{
   echo "Une erreur s'est produite";
   echo $e->getMessage();
}
