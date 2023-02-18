<?php

namespace core;

use JetBrains\PhpStorm\Pure;

class Controller
{
    public View $view;

    #[Pure]
    public function __construct()
    {
        $this->view = new View();
    }
}