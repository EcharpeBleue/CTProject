<?php
declare(strict_types=1);
require_once dirname(__DIR__) .'/vendor/autoload.php';
use App\CTProject\router\HttpRequest;
use App\CTProject\router\Router;
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