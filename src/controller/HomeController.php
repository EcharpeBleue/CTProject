<?php
declare(strict_types=1);

namespace App\CTProject\controller;

class AccueilController extends BaseController
{
    public function home():void
    {
        $this->view("Accueil/home");
    }
}