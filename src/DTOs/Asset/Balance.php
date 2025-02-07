<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $coin
 * @property null|float $walletBalance
 * @property null|float $transferBalance
 * @property null|float $bonus
 */
class Balance extends DTO
{
    public function casts(): array
    {
        return [
            'coin' => StringCast::class,
            'walletBalance' => FloatCast::class,
            'transferBalance' => FloatCast::class,
            'bonus' => FloatCast::class,
        ];
    }
}
