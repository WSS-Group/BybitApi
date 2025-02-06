<?php

namespace BybitApi\Facades;

/**
 * @see \BybitApi\Groups\Asset
 */
class Asset extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\Asset::class;
    }
}
