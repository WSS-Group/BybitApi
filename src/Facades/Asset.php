<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\AllCoinsBalance;
use BybitApi\DTOs\Asset\CoinExchange;
use BybitApi\DTOs\Asset\CoinInfo;
use BybitApi\DTOs\Asset\DeliveryRecord;
use BybitApi\DTOs\Asset\SingleCoinBalance;
use BybitApi\DTOs\Asset\SubUID;
use BybitApi\DTOs\Asset\WithdrawableAmount;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\Category;
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
