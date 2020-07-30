<?php

namespace App;

class Postcard 
{

    public static function resolveFacade($name) 
    {
        return app()[$name];
    }

    public static function __callStatic($method, $argument)
    {
        return (self::resolveFacade('Postcard'))->$method(...$argument);
    }
} 