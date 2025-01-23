<?php

namespace BybitApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BybitApi\BybitApi
 */
class BybitApi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\BybitApi::class;
    }
}
