<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\AllCoinsBalance;
use BybitApi\DTOs\Asset\CoinExchange;
use BybitApi\DTOs\Asset\CoinInfo;
use BybitApi\DTOs\Asset\Convert;
use BybitApi\DTOs\Asset\ConvertCoin;
use BybitApi\DTOs\Asset\ConvertQuote;
use BybitApi\DTOs\Asset\DeliveryRecord;
use BybitApi\DTOs\Asset\SingleCoinBalance;
use BybitApi\DTOs\Asset\SubUID;
use BybitApi\DTOs\Asset\Transfer;
use BybitApi\DTOs\Asset\TransferRecord;
use BybitApi\DTOs\Asset\UniversalTransferRecord;
use BybitApi\DTOs\Asset\WithdrawableAmount;
use BybitApi\DTOs\Asset\WithdrawalRecord;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\Category;
use BybitApi\Enums\CoinType;
use BybitApi\Enums\ConvertAccountType;
use BybitApi\Enums\ConvertSide;
use BybitApi\Enums\FeeType;
use BybitApi\Enums\TransferStatus;
use BybitApi\Enums\WithdrawType;
use BybitApi\Http\Integrations\Bybit\Entities\Assets\Beneficiary;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @method CursorCollection<int, DeliveryRecord> getDeliveryRecord(Category $category, null|BackedEnum|string $symbol = null, ?Carbon $startTime = null, ?Carbon $endTime = null, ?string $expDate = null, ?int $limit = null, ?string $cursor = null)
 * @method CursorCollection<int, CoinExchange> getCoinExchangeRecords(null|BackedEnum|string $fromCoin = null, null|BackedEnum|string $toCoin = null, ?int $limit = null, ?string $cursor = null)
 * @method Collection<string, CoinInfo> getCoinInfo(null|BackedEnum|string $coin = null)
 * @method SubUID getSubUID()
 * @method AllCoinsBalance getAllCoinsBalance(AccountType $accountType, null|BackedEnum|string $coin = null, ?string $memberId = null, ?bool $withBonus = null)
 * @method SingleCoinBalance getSingleCoinBalance(AccountType $accountType, BackedEnum|string $coin, ?string $memberId = null, ?AccountType $toAccountType = null, ?string $toMemberId = null, ?bool $withBonus = null, ?bool $withTransferSafeAmount = null, ?bool $withLtvTransferSafeAmount = null)
 * @method WithdrawableAmount getWithdrawableAmount(BackedEnum|string $coin)
 * @method Collection<int, string> getTransferableCoin(AccountType $fromAccountType, AccountType $toAccountType)
 * @method Transfer createInternalTransfer(BackedEnum|string $coin, string $amount, AccountType $fromAccountType, AccountType $toAccountType, ?string $transferId = null)
 * @method CursorCollection<int, TransferRecord> getInternalTransferRecords(?string $transferId = null, null|BackedEnum|string $coin = null, ?TransferStatus $status = null, ?Carbon $startTime = null, ?Carbon $endTime = null, ?int $limit = null, ?string $cursor = null)
 * @method Transfer createUniversalTransfer(BackedEnum|string $coin, string $amount, int $fromMemberId, AccountType $fromAccountType, int $toMemberId, AccountType $toAccountType, ?string $transferId = null)
 * @method CursorCollection<int, UniversalTransferRecord> getUniversalTransferRecords(?string $transferId = null, null|BackedEnum|string $coin = null, ?TransferStatus $status = null, ?Carbon $startTime = null, ?Carbon $endTime = null, ?int $limit = null, ?string $cursor = null)
 * @method CursorCollection<int, WithdrawalRecord> getWithdrawalRecords(?string $withdrawID = null, ?string $txID = null, null|BackedEnum|string $coin = null, ?WithdrawType $withdrawType = null, ?Carbon $startTime = null, ?Carbon $endTime = null, ?int $limit = null, ?string $cursor = null)
 * @method string withdraw(BackedEnum|string $coin, string $address, string $amount, Carbon $timestamp, ?string $chain = null, ?string $tag = null, ?int $forceChain = null, ?AccountType $accountType = null, ?FeeType $feeType = null, ?string $requestId = null, ?Beneficiary $beneficiary = null)
 * @method bool cancelWithdrawal(string $id)
 * @method Collection<string, ConvertCoin> getConvertCoinList(ConvertAccountType $accountType, null|BackedEnum|string $coin = null, ?ConvertSide $side = null)
 * @method ConvertQuote requestAQuote(ConvertAccountType $accountType, BackedEnum|string $fromCoin, BackedEnum|string $toCoin, BackedEnum|string $requestCoin, string $requestAmount, ?CoinType $fromCoinType = null, ?CoinType $toCoinType = null, ?string $paramType = null, ?string $paramValue = null, ?string $requestId = null)
 * @method Convert confirmAQuote(string $quoteTxId)
 *
 * @see \BybitApi\Groups\Asset
 */
class Asset extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\Asset::class;
    }
}
