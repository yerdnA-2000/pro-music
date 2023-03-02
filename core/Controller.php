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

    protected function isAjax(): bool
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
}