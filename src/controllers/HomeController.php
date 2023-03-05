<?php

namespace src\controllers;

use core\Controller;
use src\models\Review;
use src\services\ApplicationService;

class HomeController extends Controller
{

    public function index()
    {
        $review = new Review();
        $reviews = $review->all();
        //dump($reviews->all());

        $this->view->render('home.php', ['reviews' => $reviews]);
    }

}