<?php

namespace core;

use core\interfaces\ModelInterface;

class Model implements ModelInterface
{
    public $string;

    public function __construct()
    {
        $this->string = "MVC + PHP = Awesome, click here!";
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}