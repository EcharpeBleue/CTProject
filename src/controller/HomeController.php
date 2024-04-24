<?php
declare(strict_types=1);

namespace App\CTProject\controller;

class HomeController extends BaseController
{
    public function index():void
    {
        $this->view("Home/index");
    }
}