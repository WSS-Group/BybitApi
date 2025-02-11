<?php

namespace BybitApi\Facades;

use BybitApi\CursorCollection;
use BybitApi\DTOs\User\UID;
use Illuminate\Support\Collection;

/**
 * @method Collection<int, UID> getLimitedSubUidList()
 * @method CursorCollection<int, UID> getUnlimitedSubUidList(?int $pageSize = null, ?string $nextCursor = null)
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
