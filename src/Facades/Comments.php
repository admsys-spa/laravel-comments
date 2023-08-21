<?php

namespace Admsys\Comments\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Admsys\Comments\Comments
 */
class Comments extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Admsys\Comments\Comments::class;
    }
}
