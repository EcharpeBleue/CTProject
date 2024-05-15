<?php
declare(strict_types=1);

namespace app\CTProject\controller;

class LogoutController extends BaseController
{
    public function index():void
    {
        $this->view("Logout/index");
    }
}