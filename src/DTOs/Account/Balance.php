<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Account\Balance\Coin;
use BybitApi\DTOs\Casts\DTOArrayCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\AccountType;

/**
 * @property null|\BybitApi\Enums\AccountType $accountType
 * @property null|float $accountLTV
 * @property null|float $accountIMRate
 * @property null|float $accountMMRate
 * @property null|float $totalEquity
 * @property null|float $totalWalletBalance
 * @property null|float $totalMarginBalance
 * @property null|float $totalAvailableBalance
 * @property null|float $totalPerpUPL
 * @property null|float $totalInitialMargin
 * @property null|float $totalMaintenanceMargin
 * @property null|Coin[] $coins
 */
class Balance extends DTO
{
    public function aliases(): array
    {
        return ['coin' => 'coins'];
    }

    public function casts(): array
    {
        return [
            'accountType' => new EnumCast(AccountType::class),
            'accountLTV' => FloatCast::class,
            'accountIMRate' => FloatCast::class,
            'accountMMRate' => FloatCast::class,
            'totalEquity' => FloatCast::class,
            'totalWalletBalance' => FloatCast::class,
            'totalMarginBalance' => FloatCast::class,
            'totalAvailableBalance' => FloatCast::class,
            'totalPerpUPL' => FloatCast::class,
            'totalInitialMargin' => FloatCast::class,
            'totalMaintenanceMargin' => FloatCast::class,
            'coins' => new DTOArrayCast(Coin::class),
        ];
    }
}
