<?php

namespace BybitApi\Facades;

use BybitApi\CursorCollection;
use BybitApi\DTOs\User\ApiKey;
use BybitApi\DTOs\User\ChangedApiKey;
use BybitApi\DTOs\User\SubApiKey;
use BybitApi\DTOs\User\UID;
use BybitApi\DTOs\User\WalletType;
use BybitApi\Enums\MemberType;
use BybitApi\Http\Integrations\Bybit\Entities\Users\Permissions;
use Illuminate\Support\Collection;

/**
 * @method UID createSubUID(string $username, MemberType $memberType, ?string $password = null, ?bool $switch = null, ?string $note = null)
 * @method ChangedApiKey createSubUidApiKey(int $subuid, bool $readOnly, Permissions $permissions, ?string $note = null, ?array $ips = null)
 * @method Collection<int, UID> getLimitedSubUidList()
 * @method CursorCollection<int, UID> getUnlimitedSubUidList(?int $pageSize = null, ?string $nextCursor = null)
 * @method bool freezeSubUid(string $subuid, bool $frozen)
 * @method ApiKey getApiKeyInformation()
 * @method CursorCollection<int, SubApiKey> getSubAccountAllApiKeys(string $subMemberId, ?int $limit = null, ?string $cursor = null)
 * @method Collection<int, WalletType> getUIDWalletType(?array $memberIds = null)
 * @method ChangedApiKey modifyMasterApiKey(?bool $readOnly = null, ?Permissions $permissions = null, ?array $ips = null)
 * @method ChangedApiKey modifySubApiKey(?string $apikey = null, ?bool $readOnly = null, ?Permissions $permissions = null, ?array $ips = null)
 * @method bool deleteSubUid(string $subuid)
 * @method bool deleteMasterApiKey()
 * @method bool deleteSubApiKey(?string $apikey = null)
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
