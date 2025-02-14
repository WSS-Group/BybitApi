<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Account\AccountInfo;
use BybitApi\DTOs\Account\Balance;
use BybitApi\DTOs\Account\BorrowHistory;
use BybitApi\DTOs\Account\ChangedCollateral;
use BybitApi\DTOs\Account\CoinGreek;
use BybitApi\DTOs\Account\CollateralInfo;
use BybitApi\DTOs\Account\FeeRate;
use BybitApi\DTOs\Account\Repayment;
use BybitApi\DTOs\Account\UpgradeResult;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\Category;
use BybitApi\Enums\CollateralSwitch;
use BybitApi\Http\Integrations\Bybit\Entities\Account\CollateralCoin;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @method Collection<int, Balance> getWalletBalance(AccountType $accountType, null|BackedEnum|string $coin = null)
 * @method float getTransferableAmount(BackedEnum|string $coinName)
 * @method UpgradeResult upgradeToUnifiedAccount()
 * @method CursorCollection<int, BorrowHistory> getBorrowHistory(null|BackedEnum|string $currency = null, ?Carbon $startTime = null, ?Carbon $endTime = null, ?int $limit = null, ?string $cursor = null)
 * @method Collection<int, Repayment> repayLiability(null|BackedEnum|string $coin = null)
 * @method bool setCollateralCoin(BackedEnum|string $coin, CollateralSwitch $switch)
 * @method Collection<string, ChangedCollateral> batchSetCollateralCoin(CollateralCoin ...$coins)
 * @method Collection<string, CollateralInfo> getCollateralInfo(null|BackedEnum|string $currency = null)
 * @method Collection<string, CoinGreek> getCoinGreeks(null|BackedEnum|string $baseCoin = null)
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
