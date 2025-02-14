<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\DTOs\Account\AccountInfo;
use BybitApi\DTOs\Account\Balance;
use BybitApi\DTOs\Account\CollateralInfo;
use BybitApi\DTOs\Account\FeeRate;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\Category;
use Illuminate\Support\Collection;

/**
 * @method Collection<int, Balance> getWalletBalance(AccountType $accountType, null|BackedEnum|string $coin = null)
 * @method Collection<string, CollateralInfo> getCollateralInfo(null|BackedEnum|string $currency = null)
 * @method Collection<string, FeeRate> getFeeRate(Category $category, null|BackedEnum|string $symbol = null, null|BackedEnum|string $baseCoin = null)
 * @method AccountInfo getAccountInfo()
 *
 * @see \BybitApi\Groups\Account
 */
class Account extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\Account::class;
    }
}
