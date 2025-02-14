<?php

namespace BybitApi\DTOs\Account\Balance;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $coin
 * @property null|float $equity
 * @property null|float $usdValue
 * @property null|float $walletBalance
 * @property null|float $free
 * @property null|float $locked
 * @property null|float $spotHedgingQty
 * @property null|float $borrowAmount
 * @property null|float $availableToWithdraw
 * @property null|float $accruedInterest
 * @property null|float $totalOrderIM
 * @property null|float $totalPositionIM
 * @property null|float $totalPositionMM
 * @property null|float $unrealisedPnl
 * @property null|float $cumRealisedPnl
 * @property null|float $bonus
 * @property null|bool $marginCollateral
 * @property null|bool $collateralSwitch
 * @property null|float $availableToBorrow
 */
class Coin extends DTO
{
    public function casts(): array
    {
        return [
            'coin' => StringCast::class,
            'equity' => FloatCast::class,
            'usdValue' => FloatCast::class,
            'walletBalance' => FloatCast::class,
            'free' => FloatCast::class,
            'locked' => FloatCast::class,
            'spotHedgingQty' => FloatCast::class,
            'borrowAmount' => FloatCast::class,
            'availableToWithdraw' => FloatCast::class,
            'accruedInterest' => FloatCast::class,
            'totalOrderIM' => FloatCast::class,
            'totalPositionIM' => FloatCast::class,
            'totalPositionMM' => FloatCast::class,
            'unrealisedPnl' => FloatCast::class,
            'cumRealisedPnl' => FloatCast::class,
            'bonus' => FloatCast::class,
            'marginCollateral' => BooleanCast::class,
            'collateralSwitch' => BooleanCast::class,
            'availableToBorrow' => FloatCast::class,
        ];
    }
}
