<?php

namespace core;

use core\interfaces\ConfigInterface;

class Config implements ConfigInterface
{

    public static function getParams() : array
    {
        return require('config/params.php');
    }
}