<?php

namespace core;

use core\interfaces\ViewInterface;

class View implements ViewInterface
{
    private string $layout;

    public function render($content, $data = null, $layout = null)
    {
        if (is_array($data)) {
            extract($data);
        }
        $this->setLayout($layout);

        include 'src/views/' . $this->layout;
    }

    /**
     * @param null|string $defaultLayout
     */
    protected function setLayout(?string $defaultLayout): void
    {
        $this->layout = $defaultLayout ?? Config::getParams()['base']['view']['defaultLayout'];
    }
}