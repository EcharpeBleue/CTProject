<?php
declare(strict_types=1);

namespace app\CTProject\controller;

class ConnexionController extends BaseController
{
    public function index():void
    {
        $this->view("Connexion/index");
    }
}