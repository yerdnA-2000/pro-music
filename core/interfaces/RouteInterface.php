<?php

namespace core\interfaces;

interface RouteInterface
{
    public function getURI(): string;

    public function run() : void;
}