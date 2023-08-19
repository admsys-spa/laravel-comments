<?php

namespace Admsys\LaravelComments\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Admsys\LaravelComments\LaravelComments
 */
class LaravelComments extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Admsys\LaravelComments\LaravelComments::class;
    }
}
