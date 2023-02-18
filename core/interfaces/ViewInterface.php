<?php

namespace core\interfaces;

interface ViewInterface
{
    public function render($content, $data, $layout);
}