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
 * @property null|float $transferSafeAmount
 * @property null|float $ltvTransferSafeAmount
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
            'transferSafeAmount' => FloatCast::class,
            'ltvTransferSafeAmount' => FloatCast::class,
        ];
    }
}
