<?php

use core\Route;

require_once __DIR__ . '/vendor/autoload.php';

$namespaces = function (string $path) {
    if (preg_match('/\\\\/', $path)) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    }
    if (\stream_resolve_include_path("{$path}.php") !== false) {
        require_once("{$path}.php");
    }
};

\spl_autoload_register($namespaces);

(new Route())->run();