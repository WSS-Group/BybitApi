<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $baseCoin
 * @property null|bool $mmpEnabled
 * @property null|int $window
 * @property null|int $frozenPeriod
 * @property null|float $qtyLimit
 * @property null|float $deltaLimit
 * @property null|\Illuminate\Support\Carbon $mmpFrozenUntil
 */
class MmpState extends DTO
{
    public function casts(): array
    {
        return [
            'baseCoin' => StringCast::class,
            'mmpEnabled' => BooleanCast::class,
            'window' => IntCast::class,
            'frozenPeriod' => IntCast::class,
            'qtyLimit' => FloatCast::class,
            'deltaLimit' => FloatCast::class,
            'mmpFrozenUntil' => TimestampMsCast::class,
        ];
    }
}
