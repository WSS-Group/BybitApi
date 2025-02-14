<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $currency
 * @property null|\Illuminate\Support\Carbon $createdTime
 * @property null|float $borrowCost
 * @property null|float $hourlyBorrowRate
 * @property null|float $InterestBearingBorrowSize
 * @property null|float $costExemption
 * @property null|float $borrowAmount
 * @property null|float $unrealisedLoss
 * @property null|float $freeBorrowedAmount
 */
class BorrowHistory extends DTO
{
    public function casts(): array
    {
        return [
            'currency' => StringCast::class,
            'createdTime' => TimestampMsCast::class,
            'borrowCost' => FloatCast::class,
            'hourlyBorrowRate' => FloatCast::class,
            'InterestBearingBorrowSize' => FloatCast::class,
            'costExemption' => FloatCast::class,
            'borrowAmount' => FloatCast::class,
            'unrealisedLoss' => FloatCast::class,
            'freeBorrowedAmount' => FloatCast::class,
        ];
    }
}
