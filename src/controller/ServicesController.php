<?php
declare(strict_types=1);

namespace app\CTProject\controller;

class ServicesController extends BaseController
{
    public function index():void
    {
        $this->view("Services/index");
    }
}