<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $symbol
 * @property null|string $baseCoin
 * @property null|float $takerFeeRate
 * @property null|float $makerFeeRate
 */
class FeeRate extends DTO
{
    public function casts(): array
    {
        return [
            'symbol' => StringCast::class,
            'baseCoin' => StringCast::class,
            'takerFeeRate' => FloatCast::class,
            'makerFeeRate' => FloatCast::class,
        ];
    }
}
