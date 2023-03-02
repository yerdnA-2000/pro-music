<?php

namespace core;

use core\interfaces\ViewInterface;
use JetBrains\PhpStorm\NoReturn;

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

    #[NoReturn]
    public function redirect($url) : void
    {
        header('location: ' . $url);
        exit;
    }

    #[NoReturn]
    public function errorCode($code) : void
    {
        http_response_code($code);
        $path = "src/views/errors/{$code}.php";

        if (file_exists($path)) {
            require_once $path;
        }
        exit;
    }

    #[NoReturn]
    public function message($status, $message, $desc = "")
    {
        $json = json_encode([
            'status' => $status,
            'message' => $message,
            'desc' => $desc,
        ]);
        if ($json) {
            exit($json);
        }
        exit();
    }

    #[NoReturn]
    public function location($url)
    {
        exit(json_encode(['url' => $url]));
    }
}