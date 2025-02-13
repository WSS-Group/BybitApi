<?php

namespace BybitApi\Groups;

use BybitApi\CursorCollection;
use BybitApi\DTOs\User\ApiKey;
use BybitApi\DTOs\User\ChangedApiKey;
use BybitApi\DTOs\User\UID;
use BybitApi\Enums\MemberType;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Entities\Users\Permissions;
use BybitApi\Http\Integrations\Bybit\Requests\User\CreateSubUID;
use BybitApi\Http\Integrations\Bybit\Requests\User\CreateSubUIDApiKey;
use BybitApi\Http\Integrations\Bybit\Requests\User\DeleteSubUID;
use BybitApi\Http\Integrations\Bybit\Requests\User\FreezeSubUID;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetApiKeyInformation;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetLimitedUIDList;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetSubAccountAllApiKeys;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetUIDWalletType;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetUnlimitedUIDList;
use BybitApi\Http\Integrations\Bybit\Requests\User\ModifyMasterApiKey;
use Illuminate\Support\Collection;

class User extends Group
{
    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/create-subuid
     */
    public function createSubUID(
        string $username,
        MemberType $memberType,
        ?string $password = null,
        ?bool $switch = null,
        ?string $note = null,
    ): UID {
        return $this->send(new CreateSubUID($username, $memberType, $password, $switch, $note))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/create-subuid-apikey
     */
    public function createSubUidApiKey(
        int $subuid,
        bool $readOnly,
        Permissions $permissions,
        ?string $note = null,
        ?array $ips = null
    ): ChangedApiKey {
        return $this->send(new CreateSubUIDApiKey($subuid, $readOnly, $permissions, $note, $ips))->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\User\UID>
     *
     * @link https://bybit-exchange.github.io/docs/v5/user/subuid-list
     */
    public function getLimitedSubUidList(): Collection
    {
        return $this->send(new GetLimitedUIDList)->dto();
    }

    /**
     * @return CursorCollection<int, \BybitApi\DTOs\User\UID>
     *
     * @link https://bybit-exchange.github.io/docs/v5/user/page-subuid
     */
    public function getUnlimitedSubUidList(?int $pageSize = null, ?string $nextCursor = null): CursorCollection
    {
        return $this->send(new GetUnlimitedUIDList($pageSize, $nextCursor))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/froze-subuid
     */
    public function freezeSubUid(string $subuid, bool $frozen): bool
    {
        return $this->send(new FreezeSubUID($subuid, $frozen))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/apikey-info
     */
    public function getApiKeyInformation(): ApiKey
    {
        return $this->send(new GetApiKeyInformation)->dto();
    }

    /**
     * @return CursorCollection<int, \BybitApi\DTOs\User\SubApiKey>
     *
     * @link https://bybit-exchange.github.io/docs/v5/user/list-sub-apikeys
     */
    public function getSubAccountAllApiKeys(
        string $subMemberId,
        ?int $limit = null,
        ?string $cursor = null
    ): CursorCollection {
        return $this->send(new GetSubAccountAllApiKeys($subMemberId, $limit, $cursor))->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\User\WalletType>
     *
     * @link https://bybit-exchange.github.io/docs/v5/user/wallet-type
     */
    public function getUIDWalletType(?array $memberIds = null): Collection
    {
        return $this->send(new GetUIDWalletType($memberIds))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/modify-master-apikey
     */
    public function modifyMasterApiKey(
        ?bool $readOnly = null,
        ?Permissions $permissions = null,
        ?array $ips = null,
    ): ChangedApiKey {
        return $this->send(new ModifyMasterApiKey($readOnly, $permissions, $ips))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/modify-sub-apikey
     */
    public function modifySubApiKey(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/rm-subuid
     */
    public function deleteSubUid(string $subuid): bool
    {
        return $this->send(new DeleteSubUID($subuid))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/rm-master-apikey
     */
    public function deleteMasterApiKey(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/rm-sub-apikey
     */
    public function deleteSubApiKey(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }
}
