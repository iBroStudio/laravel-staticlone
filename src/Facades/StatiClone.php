<?php

namespace IBroStudio\StatiClone\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IBroStudio\StatiClone\StatiClone
 */
class StatiClone extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \IBroStudio\StatiClone\StatiClone::class;
    }
}
