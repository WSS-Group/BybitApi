<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $baseCoin
 * @property null|float $totalDelta
 * @property null|float $totalGamma
 * @property null|float $totalVega
 * @property null|float $totalTheta
 */
class CoinGreek extends DTO
{
    public function casts(): array
    {
        return [
            'baseCoin' => StringCast::class,
            'totalDelta' => FloatCast::class,
            'totalGamma' => FloatCast::class,
            'totalVega' => FloatCast::class,
            'totalTheta' => FloatCast::class,
        ];
    }
}
