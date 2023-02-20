<?php

namespace core\helpers;

class ClassHelper
{
    public static function getNamespaceFromFile($file) : array
    {
        if (preg_match_all('#namespace\s+(.+?);|\n$#sm', file_get_contents($file), $m)) {

            return $m[1];
        }

        return [];
    }
}