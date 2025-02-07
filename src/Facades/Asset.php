<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\DTOs\Asset\AllCoinsBalance;
use BybitApi\Enums\AccountType;

/**
 * @method AllCoinsBalance getAllCoinsBalance(AccountType $accountType, null|BackedEnum|string $coin = null, ?string $memberId = null, ?bool $withBonus = null)
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
