<?php

namespace notebook;

class Notebook
{
    public static function getPath($path = null)
    {
        return __DIR__.DIRECTORY_SEPARATOR.$path;
    }
}