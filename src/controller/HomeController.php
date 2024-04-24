<?php
declare(strict_types=1);

namespace app\CTProject\controller;

class HomeController extends BaseController
{
    public function index():void
    {
        $this->view("Home/index");
    }
}