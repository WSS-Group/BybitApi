<?php

namespace BybitApi\Facades;

use BybitApi\CursorCollection;
use BybitApi\DTOs\User\UID;
use BybitApi\Enums\MemberType;
use Illuminate\Support\Collection;

/**
 * @method UID createSubUID(string $username, MemberType $memberType, ?string $password = null, ?bool $switch = null, ?string $note = null)
 * @method Collection<int, UID> getLimitedSubUidList()
 * @method CursorCollection<int, UID> getUnlimitedSubUidList(?int $pageSize = null, ?string $nextCursor = null)
 * @method bool freezeSubUid(string $subuid, bool $frozen)
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
