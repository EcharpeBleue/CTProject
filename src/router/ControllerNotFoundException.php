<?php
declare(strict_types=1);
namespace App\CTProject\router;
class ControllerNotFoundException extends \Exception
{
	public function __construct($message = "controller was not found")
		{
			parent::__construct($message, 1);
		}
}