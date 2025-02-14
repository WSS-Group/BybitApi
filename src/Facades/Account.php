<?php

namespace BybitApi\Facades;

use BybitApi\DTOs\Account\AccountInfo;

/**
 * @method AccountInfo getAccountInfo()
 *
 * @see \BybitApi\Groups\Account
 */
class Account extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\Account::class;
    }
}
