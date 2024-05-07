<?php
declare(strict_types=1);

namespace app\CTProject\controller;

class ConnectController extends BaseController
{
    public function index():void
    {
        $this->view("Connnect/index");
    }
}