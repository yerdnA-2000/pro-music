<?php

namespace src\controllers;

use core\Controller;
use src\models\Review;

class HomeController extends Controller
{

    public function index()
    {
        $reviews = new Review();
        $reviews->all();
        //dump($reviews->all());

        $this->view->render('home.php');
    }

}