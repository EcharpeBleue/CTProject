<?php
declare(strict_types=1);

namespace app\CTProject\controller;

class LoginController extends BaseController
{
    public function index():void
    {
        $this->view("Login/index");
    }
}