<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $fromCoin
 * @property null|float $fromAmount
 * @property null|string $toCoin
 * @property null|float $toAmount
 * @property null|float $exchangeRate
 * @property null|\Illuminate\Support\Carbon $createdTime
 * @property null|string $exchangeTxId
 */
class CoinExchange extends DTO
{
    public function casts(): array
    {
        return [
            'fromCoin' => StringCast::class,
            'fromAmount' => FloatCast::class,
            'toCoin' => StringCast::class,
            'toAmount' => FloatCast::class,
            'exchangeRate' => FloatCast::class,
            'createdTime' => TimestampCast::class,
            'exchangeTxId' => StringCast::class,
        ];
    }
}
