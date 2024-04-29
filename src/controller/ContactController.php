<?php
declare(strict_types=1);

namespace app\CTProject\controller;

class ContactController extends BaseController
{
    public function index():void
    {
        $this->view("Contact/index");
    }
}