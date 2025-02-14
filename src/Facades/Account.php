<?php

namespace BybitApi\Facades;

/**
 * @see \BybitApi\Groups\Account
 */
class Account extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\Account::class;
    }
}
