<?php

namespace src\controllers;

use core\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $this->view->render('home.php');
    }

}