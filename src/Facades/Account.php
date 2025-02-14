<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\DTOs\Account\AccountInfo;
use BybitApi\DTOs\Account\FeeRate;
use BybitApi\Enums\Category;
use Illuminate\Support\Collection;

/**
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
