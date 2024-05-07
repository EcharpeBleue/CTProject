<?php
declare(strict_types=1);

namespace app\CTProject\controller;

class ModerationController extends BaseController
{
    public function index():void
    {
        $this->view("Moderation/index");
    }
}