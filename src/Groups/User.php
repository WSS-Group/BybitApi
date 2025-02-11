<?php

namespace BybitApi\Groups;

use BybitApi\Exceptions\NotImplementedYetException;

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
     * @link https://bybit-exchange.github.io/docs/v5/user/subuid-list
     */
    public function getLimitedSubUidList(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/page-subuid
     */
    public function getPaginatedSubUidList(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/user/froze-subuid
     */
    public function freezeSubUid(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
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
