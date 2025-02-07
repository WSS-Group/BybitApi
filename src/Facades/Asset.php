<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\DTOs\Asset\AllCoinsBalance;
use BybitApi\DTOs\Asset\SingleCoinBalance;
use BybitApi\DTOs\Asset\SubUID;
use BybitApi\DTOs\Asset\WithdrawableAmount;
use BybitApi\Enums\AccountType;

/**
 * @method SubUID getSubUID()
 * @method AllCoinsBalance getAllCoinsBalance(AccountType $accountType, null|BackedEnum|string $coin = null, ?string $memberId = null, ?bool $withBonus = null)
 * @method SingleCoinBalance getSingleCoinBalance(AccountType $accountType, BackedEnum|string $coin, ?string $memberId = null, ?AccountType $toAccountType = null, ?string $toMemberId = null, ?bool $withBonus = null, ?bool $withTransferSafeAmount = null, ?bool $withLtvTransferSafeAmount = null)
 * @method WithdrawableAmount getWithdrawableAmount(BackedEnum|string $coin)
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
