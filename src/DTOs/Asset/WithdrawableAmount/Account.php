<?php

namespace BybitApi\DTOs\Asset\WithdrawableAmount;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $coin
 * @property null|float $withdrawableAmount
 * @property null|float $availableBalance
 */
class Account extends DTO
{
    public function casts(): array
    {
        return [
            'coin' => StringCast::class,
            'withdrawableAmount' => FloatCast::class,
            'availableBalance' => FloatCast::class,
        ];
    }
}
