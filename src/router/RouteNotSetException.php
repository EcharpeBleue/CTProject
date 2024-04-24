<?php
declare(strict_types=1);
namespace app\CTProject\router;

class RouteNotSetException extends \Exception
{
    public function __construct($message = "Route was not set")
        {
            parent::__construct($message, 1);
        }
}
