<?php

namespace BybitApi\DTOs\Market\Ticker;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $symbol
 * @property null|float $bid1Price
 * @property null|float $bid1Size
 * @property null|float $ask1Price
 * @property null|float $ask1Size
 * @property null|float $lastPrice
 * @property null|float $prevPrice24h
 * @property null|float $price24hPcnt
 * @property null|float $highPrice24h
 * @property null|float $lowPrice24h
 * @property null|float $turnover24h
 * @property null|float $volume24h
 * @property null|float $usdIndexPrice
 */
readonly class Spot extends DTO
{
    public function casts(): array
    {
        return [
            'symbol' => StringCast::class,
            'bid1Price' => FloatCast::class,
            'bid1Size' => FloatCast::class,
            'ask1Price' => FloatCast::class,
            'ask1Size' => FloatCast::class,
            'lastPrice' => FloatCast::class,
            'prevPrice24h' => FloatCast::class,
            'price24hPcnt' => FloatCast::class,
            'highPrice24h' => FloatCast::class,
            'lowPrice24h' => FloatCast::class,
            'turnover24h' => FloatCast::class,
            'volume24h' => FloatCast::class,
            'usdIndexPrice' => FloatCast::class,
        ];
    }
}
