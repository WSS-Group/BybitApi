<?php

namespace BybitApi\Groups;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\AllCoinsBalance;
use BybitApi\DTOs\Asset\SingleCoinBalance;
use BybitApi\DTOs\Asset\SubUID;
use BybitApi\DTOs\Asset\Transfer;
use BybitApi\DTOs\Asset\WithdrawableAmount;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\Category;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\CreateInternalTransfer;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetAllCoinsBalance;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetCoinExchangeRecords;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetCoinInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetDeliveryRecord;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetSingleCoinBalance;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetSubUID;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetTransferableCoin;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetWithdrawableAmount;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class Asset extends Group
{
    /**
     * @return CursorCollection<string, \BybitApi\DTOs\Asset\DeliveryRecord>
     *
     * @link https://bybit-exchange.github.io/docs/v5/asset/delivery
     */
    public function getDeliveryRecord(
        Category $category,
        null|BackedEnum|string $symbol = null,
        ?Carbon $startTime = null,
        ?Carbon $endTime = null,
        ?string $expDate = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): CursorCollection {
        return $this->send(new GetDeliveryRecord($category, $symbol, $startTime, $endTime, $expDate, $limit, $cursor))
            ->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/settlement
     */
    public function getUSDCSessionSettlement(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @return CursorCollection<string, \BybitApi\DTOs\Asset\CoinExchange>
     *
     * @link https://bybit-exchange.github.io/docs/v5/asset/exchange
     */
    public function getCoinExchangeRecords(
        null|BackedEnum|string $fromCoin = null,
        null|BackedEnum|string $toCoin = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): CursorCollection {
        return $this->send(new GetCoinExchangeRecords($fromCoin, $toCoin, $limit, $cursor))->dto();
    }

    /**
     * @return Collection<string, \BybitApi\DTOs\Asset\CoinInfo>
     *
     * @link https://bybit-exchange.github.io/docs/v5/asset/coin-info
     */
    public function getCoinInfo(null|BackedEnum|string $coin = null): Collection
    {
        return $this->send(new GetCoinInfo)->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/sub-uid-list
     */
    public function getSubUID(): SubUID
    {
        return $this->send(new GetSubUID)->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/balance/asset-info
     */
    public function getAssetInfo(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/balance/all-balance
     */
    public function getAllCoinsBalance(
        AccountType $accountType,
        null|BackedEnum|string $coin = null,
        ?string $memberId = null,
        ?bool $withBonus = null,
    ): AllCoinsBalance {
        return $this->send(new GetAllCoinsBalance($accountType, $coin, $memberId, $withBonus))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/balance/account-coin-balance
     */
    public function getSingleCoinBalance(
        AccountType $accountType,
        BackedEnum|string $coin,
        ?string $memberId = null,
        ?AccountType $toAccountType = null,
        ?string $toMemberId = null,
        ?bool $withBonus = null,
        ?bool $withTransferSafeAmount = null,
        ?bool $withLtvTransferSafeAmount = null,
    ): SingleCoinBalance {
        return $this->send(new GetSingleCoinBalance(
            $accountType, $coin, $memberId, $toAccountType, $toMemberId,
            $withBonus, $withTransferSafeAmount, $withLtvTransferSafeAmount
        ))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/balance/delay-amount
     */
    public function getWithdrawableAmount(BackedEnum|string $coin): WithdrawableAmount
    {
        return $this->send(new GetWithdrawableAmount($coin))->dto();
    }

    /**
     * @return Collection<int, string>
     *
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/transferable-coin
     */
    public function getTransferableCoin(AccountType $fromAccountType, AccountType $toAccountType): Collection
    {
        return $this->send(new GetTransferableCoin($fromAccountType, $toAccountType))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/create-inter-transfer
     */
    public function createInternalTransfer(
        BackedEnum|string $coin,
        string $amount,
        AccountType $fromAccountType,
        AccountType $toAccountType,
        ?string $transferId = null,
    ): Transfer {
        return $this->send(new CreateInternalTransfer($coin, $amount, $fromAccountType, $toAccountType, $transferId))
            ->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/inter-transfer-list
     */
    public function getInternalTransferRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/unitransfer
     */
    public function createUniversalTransfer(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/unitransfer-list
     */
    public function getUniversalTransferRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/deposit-coin-spec
     */
    public function getAllowedDepositCoinInfo(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/set-deposit-acct
     */
    public function setDepositAccount(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/deposit-record
     */
    public function getDepositRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/sub-deposit-record
     */
    public function getSubDepositRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/internal-deposit-record
     */
    public function getInternalDepositRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/master-deposit-addr
     */
    public function getMasterDepositAddress(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/sub-deposit-addr
     */
    public function getSubDepositAddress(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw/withdraw-record
     */
    public function getWithdrawalRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw/vasp-list
     */
    public function getExchangeEntityList(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw
     */
    public function withdraw(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw/cancel-withdraw
     */
    public function cancelWithdrawal(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/convert-coin-list
     */
    public function getConvertCoinList(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/apply-quote
     */
    public function requestAQuote(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/confirm-quote
     */
    public function confirmAQuote(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/get-convert-result
     */
    public function getConvertStatus(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/get-convert-history
     */
    public function getConvertHistory(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }
}
