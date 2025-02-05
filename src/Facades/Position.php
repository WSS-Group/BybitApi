<?php

namespace BybitApi\Facades;

/**
 *
 * @see \BybitApi\Groups\Position
 */
class Position extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\Position::class;
    }
}
