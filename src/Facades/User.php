<?php

namespace BybitApi\Facades;

use BybitApi\CursorCollection;
use BybitApi\DTOs\User\ApiKey;
use BybitApi\DTOs\User\SubApiKey;
use BybitApi\DTOs\User\UID;
use BybitApi\Enums\MemberType;
use Illuminate\Support\Collection;

/**
 * @method UID createSubUID(string $username, MemberType $memberType, ?string $password = null, ?bool $switch = null, ?string $note = null)
 * @method Collection<int, UID> getLimitedSubUidList()
 * @method CursorCollection<int, UID> getUnlimitedSubUidList(?int $pageSize = null, ?string $nextCursor = null)
 * @method bool freezeSubUid(string $subuid, bool $frozen)
 * @method ApiKey getApiKeyInformation()
 * @method CursorCollection<int, SubApiKey> getSubAccountAllApiKeys(string $subMemberId, ?int $limit = null, ?string $cursor = null)
 * @method bool deleteSubUid(string $subuid)
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
