<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $currency
 * @property null|float $hourlyBorrowRate
 * @property null|float $maxBorrowingAmount
 * @property null|float $freeBorrowingLimit
 * @property null|float $freeBorrowAmount
 * @property null|float $borrowAmount
 * @property null|float $otherBorrowAmount
 * @property null|float $freeBorrowingAmount
 * @property null|float $availableToBorrow
 * @property null|bool $borrowable
 * @property null|float $borrowUsageRate
 * @property null|bool $marginCollateral
 * @property null|bool $collateralSwitch
 * @property null|float $collateralRatio
 */
class CollateralInfo extends DTO
{
    public function casts(): array
    {
        return [
            'currency' => StringCast::class,
            'hourlyBorrowRate' => FloatCast::class,
            'maxBorrowingAmount' => FloatCast::class,
            'freeBorrowingLimit' => FloatCast::class,
            'freeBorrowAmount' => FloatCast::class,
            'borrowAmount' => FloatCast::class,
            'otherBorrowAmount' => FloatCast::class,
            'freeBorrowingAmount' => FloatCast::class,
            'availableToBorrow' => FloatCast::class,
            'borrowable' => BooleanCast::class,
            'borrowUsageRate' => FloatCast::class,
            'marginCollateral' => BooleanCast::class,
            'collateralSwitch' => BooleanCast::class,
            'collateralRatio' => FloatCast::class,
        ];
    }
}
