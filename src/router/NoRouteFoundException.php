<?php
declare(strict_types=1);
namespace app\CTProject\router;

class NoRouteFoundException extends \Exception
{
	public function __construct($message = "No route has been found")
		{
			parent::__construct($message, 2);
		}
}