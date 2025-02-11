<?php

namespace BybitApi\Facades;

use BybitApi\DTOs\User\UID;
use Illuminate\Support\Collection;

/**
 * @method Collection<int, UID> getLimitedSubUidList()
 *
 * @see \BybitApi\Groups\User
 */
class User extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\User::class;
    }
}
