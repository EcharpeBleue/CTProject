<?php
declare(strict_types=1);

namespace app\CTProject\controller;

class ModerationMessagesController extends BaseController
{
    public function index():void
    {
        $this->view("ModerationMessages/index");
    }
}