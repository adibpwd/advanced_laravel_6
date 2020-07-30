<?php

namespace App\newsAPI;

class Newsapi 
{

    public static function resolveFacade($name) 
    {
        return app()[$name];
    }

    public static function __callStatic($method, $argument)
    {
        return (self::resolveFacade('Newsapi')->$method(...$argument));
    }
}