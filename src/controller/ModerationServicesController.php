<?php
declare(strict_types=1);

namespace app\CTProject\controller;

class ModerationServicesController extends BaseController
{
    public function index():void
    {
        $this->view("ModerationServices/index");
    }
}