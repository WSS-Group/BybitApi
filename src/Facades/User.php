<?php

namespace BybitApi\Facades;

/**
 * @see \BybitApi\Groups\User
 */
class User extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\User::class;
    }
}
