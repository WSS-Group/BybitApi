<?php

namespace BybitApi\Groups;

use BackedEnum;
use BybitApi\DTOs\Account\AccountInfo;
use BybitApi\Enums\Category;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetAccountInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetFeeRate;
use Illuminate\Support\Collection;

class Account extends Group
{
    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/wallet-balance
     */
    public function getWalletBalance(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/unified-trans-amnt
     */
    public function getTransferableAmount(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/upgrade-unified-account
     */
    public function upgradeToUnifiedAccount(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/borrow-history
     */
    public function getBorrowHistory(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/repay-liability
     */
    public function repayLiability(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/set-collateral
     */
    public function setCollateralCoin(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/batch-set-collateral
     */
    public function batchSetCollateralCoin(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/collateral-info
     */
    public function getCollateralInfo(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/coin-greeks
     */
    public function getCoinGreeks(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @return \Illuminate\Support\Collection<string, \BybitApi\DTOs\Account\FeeRate>
     *
     * @link https://bybit-exchange.github.io/docs/v5/account/fee-rate
     */
    public function getFeeRate(
        Category $category,
        null|BackedEnum|string $symbol = null,
        null|BackedEnum|string $baseCoin = null,
    ): Collection {
        return $this->send(new GetFeeRate($category, $symbol, $baseCoin))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/account-info
     */
    public function getAccountInfo(): AccountInfo
    {
        return $this->send(new GetAccountInfo)->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/dcp-info
     */
    public function getDcpInfo(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/transaction-log
     */
    public function getUtaTransactionLog(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/contract-transaction-log
     */
    public function getClassicTransactionLog(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/smp-group
     */
    public function getSmpGroupId(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/set-margin-mode
     */
    public function setMarginMode(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/set-spot-hedge
     */
    public function setSpotHedging(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/set-mmp
     */
    public function setMmp(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/reset-mmp
     */
    public function resetMmp(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/get-mmp-state
     */
    public function getMmpState(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }
}
