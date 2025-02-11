<?php

namespace BybitApi\Groups;

use BybitApi\CursorCollection;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Requests\User\FreezeSubUID;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetLimitedUIDList;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetUnlimitedUIDList;
use Illuminate\Support\Collection;

class User extends Group
{
    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/create-subuid
     */
    public function createSubUid(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/create-subuid-apikey
     */
    public function createSubUidApiKey(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
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
    public function getApiKeyInformation(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/list-sub-apikeys
     */
    public function getSubAccountAllApiKeys(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/wallet-type
     */
    public function getUidWalletType(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/modify-master-apikey
     */
    public function modifyMasterApiKey(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/modify-sub-apikey
     */
    public function modifySubApiKey(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/rm-subuid
     */
    public function deleteSubUid(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/rm-master-apikey
     */
    public function deleteMasterApiKey(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/rm-sub-apikey
     */
    public function deleteSubApiKey(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }
}
