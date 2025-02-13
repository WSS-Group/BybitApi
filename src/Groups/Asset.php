<?php

namespace BybitApi\Groups;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\AllCoinsBalance;
use BybitApi\DTOs\Asset\Convert;
use BybitApi\DTOs\Asset\ConvertQuote;
use BybitApi\DTOs\Asset\ConvertStatus;
use BybitApi\DTOs\Asset\SingleCoinBalance;
use BybitApi\DTOs\Asset\SubUID;
use BybitApi\DTOs\Asset\Transfer;
use BybitApi\DTOs\Asset\WithdrawableAmount;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\Category;
use BybitApi\Enums\CoinType;
use BybitApi\Enums\ConvertAccountType;
use BybitApi\Enums\ConvertSide;
use BybitApi\Enums\FeeType;
use BybitApi\Enums\TransferStatus;
use BybitApi\Enums\WithdrawType;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Entities\Assets\Beneficiary;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\CancelWithdrawal;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\ConfirmAQuote;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\CreateInternalTransfer;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\CreateUniversalTransfer;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetAllCoinsBalance;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetCoinExchangeRecords;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetCoinInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetConvertCoinList;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetConvertHistory;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetConvertStatus;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetDeliveryRecord;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetInternalTransferRecords;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetSingleCoinBalance;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetSubUID;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetTransferableCoin;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetUniversalTransferRecords;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetWithdrawableAmount;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetWithdrawalRecords;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\RequestAQuote;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\Withdraw;
use Illuminate\Console\View\Components\Confirm;
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
     * @return CursorCollection<int, \BybitApi\DTOs\Asset\TransferRecord>
     *
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/inter-transfer-list
     */
    public function getInternalTransferRecords(
        ?string $transferId = null,
        null|BackedEnum|string $coin = null,
        ?TransferStatus $status = null,
        ?Carbon $startTime = null,
        ?Carbon $endTime = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): CursorCollection {
        return $this->send(
            new GetInternalTransferRecords($transferId, $coin, $status, $startTime, $endTime, $limit, $cursor)
        )->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/unitransfer
     */
    public function createUniversalTransfer(
        BackedEnum|string $coin,
        string $amount,
        int $fromMemberId,
        AccountType $fromAccountType,
        int $toMemberId,
        AccountType $toAccountType,
        ?string $transferId = null,
    ): Transfer {
        return $this->send(new CreateUniversalTransfer(
            $coin, $amount, $fromMemberId, $fromAccountType, $toMemberId, $toAccountType, $transferId
        ))->dto();
    }

    /**
     * @return CursorCollection<int, \BybitApi\DTOs\Asset\UniversalTransferRecord>
     *
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/unitransfer-list
     */
    public function getUniversalTransferRecords(
        ?string $transferId = null,
        null|BackedEnum|string $coin = null,
        ?TransferStatus $status = null,
        ?Carbon $startTime = null,
        ?Carbon $endTime = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): CursorCollection {
        return $this->send(
            new GetUniversalTransferRecords($transferId, $coin, $status, $startTime, $endTime, $limit, $cursor)
        )->dto();
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
     * @return CursorCollection<int, \BybitApi\DTOs\Asset\WithdrawalRecord>
     *
     * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw/withdraw-record
     */
    public function getWithdrawalRecords(
        ?string $withdrawID = null,
        ?string $txID = null,
        null|BackedEnum|string $coin = null,
        ?WithdrawType $withdrawType = null,
        ?Carbon $startTime = null,
        ?Carbon $endTime = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): CursorCollection {
        return $this->send(new GetWithdrawalRecords(
            $withdrawID, $txID, $coin, $withdrawType, $startTime, $endTime, $limit, $cursor
        ))->dto();
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
    public function withdraw(
        BackedEnum|string $coin,
        string $address,
        string $amount,
        Carbon $timestamp,
        ?string $chain = null,
        ?string $tag = null,
        ?int $forceChain = null,
        ?AccountType $accountType = null,
        ?FeeType $feeType = null,
        ?string $requestId = null,
        ?Beneficiary $beneficiary = null,
    ): string {
        return $this->send(new Withdraw(
            $coin, $address, $amount, $timestamp, $chain, $tag, $forceChain,
            $accountType, $feeType, $requestId, $beneficiary
        ))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw/cancel-withdraw
     */
    public function cancelWithdrawal(string $id): bool
    {
        return $this->send(new CancelWithdrawal($id))->dto();
    }

    /**
     * @return Collection<string, \BybitApi\DTOs\Asset\ConvertCoin>
     *
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/convert-coin-list
     */
    public function getConvertCoinList(
        ConvertAccountType $accountType,
        null|BackedEnum|string $coin = null,
        ?ConvertSide $side = null,
    ): Collection {
        return $this->send(new GetConvertCoinList($accountType, $coin, $side))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/apply-quote
     */
    public function requestAQuote(
        ConvertAccountType $accountType,
        BackedEnum|string $fromCoin,
        BackedEnum|string $toCoin,
        BackedEnum|string $requestCoin,
        string $requestAmount,
        ?CoinType $fromCoinType = null,
        ?CoinType $toCoinType = null,
        ?string $paramType = null,
        ?string $paramValue = null,
        ?string $requestId = null,
    ): ConvertQuote {
        return $this->send(new RequestAQuote(
            $accountType, $fromCoin, $toCoin, $requestCoin, $requestAmount,
            $fromCoinType, $toCoinType, $paramType, $paramValue, $requestId
        ))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/confirm-quote
     */
    public function confirmAQuote(string $quoteTxId): Convert
    {
        return $this->send(new ConfirmAQuote($quoteTxId))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/get-convert-result
     */
    public function getConvertStatus(string $quoteTxId, ConvertAccountType $accountType): ConvertStatus
    {
        return $this->send(new GetConvertStatus($quoteTxId, $accountType))->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\Asset\ConvertStatus>
     *
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/get-convert-history
     */
    public function getConvertHistory(
        ?ConvertAccountType $accountType = null,
        ?int $index = null,
        ?int $limit = null,
    ): Collection {
        return $this->send(new GetConvertHistory($accountType, $index, $limit))->dto();
    }
}
