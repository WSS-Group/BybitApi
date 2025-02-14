<?php

namespace BybitApi\Groups;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Account\AccountInfo;
use BybitApi\DTOs\Account\UpgradeResult;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\Category;
use BybitApi\Enums\CollateralSwitch;
use BybitApi\Enums\LogType;
use BybitApi\Enums\MarginMode;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Entities\Account\CollateralCoin;
use BybitApi\Http\Integrations\Bybit\Requests\Account\BatchSetCollateralCoin;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetAccountInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetBorrowHistory;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetClassicTransactionLog;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetCoinGreeks;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetCollateralInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetDcpInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetFeeRate;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetSmpGroupId;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetTransferableAmount;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetUtaTransactionLog;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetWalletBalance;
use BybitApi\Http\Integrations\Bybit\Requests\Account\RepayLiability;
use BybitApi\Http\Integrations\Bybit\Requests\Account\SetCollateralCoin;
use BybitApi\Http\Integrations\Bybit\Requests\Account\SetMarginMode;
use BybitApi\Http\Integrations\Bybit\Requests\Account\SetSpotHedging;
use BybitApi\Http\Integrations\Bybit\Requests\Account\UpgradeToUnifiedAccount;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class Account extends Group
{
    /**
     * @return Collection<int, \BybitApi\DTOs\Account\Balance>
     *
     * @link https://bybit-exchange.github.io/docs/v5/account/wallet-balance
     */
    public function getWalletBalance(AccountType $accountType, null|BackedEnum|string $coin = null): Collection
    {
        return $this->send(new GetWalletBalance($accountType, $coin))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/unified-trans-amnt
     */
    public function getTransferableAmount(BackedEnum|string $coinName): float
    {
        return $this->send(new GetTransferableAmount($coinName))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/upgrade-unified-account
     */
    public function upgradeToUnifiedAccount(): UpgradeResult
    {
        return $this->send(new UpgradeToUnifiedAccount)->dto();
    }

    /**
     * @return CursorCollection<int, \BybitApi\DTOs\Account\BorrowHistory>
     *
     * @link https://bybit-exchange.github.io/docs/v5/account/borrow-history
     */
    public function getBorrowHistory(
        null|BackedEnum|string $currency = null,
        ?Carbon $startTime = null,
        ?Carbon $endTime = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): CursorCollection {
        return $this->send(new GetBorrowHistory($currency, $startTime, $endTime, $limit, $cursor))->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\Account\Repayment>
     *
     * @link https://bybit-exchange.github.io/docs/v5/account/repay-liability
     */
    public function repayLiability(null|BackedEnum|string $coin = null): Collection
    {
        return $this->send(new RepayLiability($coin))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/set-collateral
     */
    public function setCollateralCoin(BackedEnum|string $coin, CollateralSwitch $switch): bool
    {
        return $this->send(new SetCollateralCoin($coin, $switch))->dto();
    }

    /**
     * @return Collection<string, \BybitApi\DTOs\Account\ChangedCollateral>
     *
     * @link https://bybit-exchange.github.io/docs/v5/account/batch-set-collateral
     */
    public function batchSetCollateralCoin(CollateralCoin ...$coins): Collection
    {
        return $this->send(new BatchSetCollateralCoin(...$coins))->dto();
    }

    /**
     * @return Collection<string, \BybitApi\DTOs\Account\CollateralInfo>
     *
     * @link https://bybit-exchange.github.io/docs/v5/account/collateral-info
     */
    public function getCollateralInfo(null|BackedEnum|string $currency = null): Collection
    {
        return $this->send(new GetCollateralInfo($currency))->dto();
    }

    /**
     * @return Collection<string, \BybitApi\DTOs\Account\CoinGreek>
     *
     * @link https://bybit-exchange.github.io/docs/v5/account/coin-greeks
     */
    public function getCoinGreeks(null|BackedEnum|string $baseCoin = null): Collection
    {
        return $this->send(new GetCoinGreeks($baseCoin))->dto();
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
     * @return Collection<string, \BybitApi\DTOs\Account\DcpInfo>
     *
     * @link https://bybit-exchange.github.io/docs/v5/account/dcp-info
     */
    public function getDcpInfo(): Collection
    {
        return $this->send(new GetDcpInfo)->dto();
    }

    /**
     * @return CursorCollection<int, \BybitApi\DTOs\Account\TransactionLog>
     *
     * @link https://bybit-exchange.github.io/docs/v5/account/transaction-log
     */
    public function getUtaTransactionLog(
        ?AccountType $accountType = null,
        ?Category $category = null,
        null|BackedEnum|string $currency = null,
        null|BackedEnum|string $baseCoin = null,
        ?LogType $type = null,
        ?Carbon $startTime = null,
        ?Carbon $endTime = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): CursorCollection {
        return $this->send(new GetUtaTransactionLog(
            $accountType, $category, $currency, $baseCoin, $type, $startTime, $endTime, $limit, $cursor
        ))->dto();
    }

    /**
     * @return CursorCollection<int, \BybitApi\DTOs\Account\TransactionLog>
     *
     * @link https://bybit-exchange.github.io/docs/v5/account/contract-transaction-log
     */
    public function getClassicTransactionLog(
        null|BackedEnum|string $currency = null,
        null|BackedEnum|string $baseCoin = null,
        ?LogType $type = null,
        ?Carbon $startTime = null,
        ?Carbon $endTime = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): CursorCollection {
        return $this->send(new GetClassicTransactionLog(
            $currency, $baseCoin, $type, $startTime, $endTime, $limit, $cursor
        ))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/smp-group
     */
    public function getSmpGroupId(): int
    {
        return $this->send(new GetSmpGroupId)->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\Account\MarginModeReason>
     *
     * @link https://bybit-exchange.github.io/docs/v5/account/set-margin-mode
     */
    public function setMarginMode(MarginMode $marginMode): Collection
    {
        return $this->send(new SetMarginMode($marginMode))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/account/set-spot-hedge
     */
    public function setSpotHedging(bool $hedgeMode): bool
    {
        return $this->send(new SetSpotHedging($hedgeMode))->dto();
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
