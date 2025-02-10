<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\CoinType;

/**
 * @property null|string $quoteTxId
 * @property null|float $exchangeRate
 * @property null|string $fromCoin
 * @property null|string $fromCoinType
 * @property null|string $toCoin
 * @property null|string $toCoinType
 * @property null|float $fromAmount
 * @property null|float $toAmount
 * @property null|\Illuminate\Support\Carbon $expiredTime
 * @property null|string $requestId
 */
class ConvertQuote extends DTO
{
    public function casts(): array
    {
        return [
            'quoteTxId' => StringCast::class,
            'exchangeRate' => FloatCast::class,
            'fromCoin' => StringCast::class,
            'fromCoinType' => new EnumCast(CoinType::class),
            'toCoin' => StringCast::class,
            'toCoinType' => new EnumCast(CoinType::class),
            'fromAmount' => FloatCast::class,
            'toAmount' => FloatCast::class,
            'expiredTime' => TimestampMsCast::class,
            'requestId' => StringCast::class,
        ];
    }
}
