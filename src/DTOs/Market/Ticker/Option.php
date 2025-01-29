<?php

namespace BybitApi\DTOs\Market\Ticker;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $symbol
 * @property null|float $bid1Price
 * @property null|float $bid1Size
 * @property null|float $bid1Iv
 * @property null|float $ask1Price
 * @property null|float $ask1Size
 * @property null|float $ask1Iv
 * @property null|float $lastPrice
 * @property null|float $highPrice24h
 * @property null|float $lowPrice24h
 * @property null|float $markPrice
 * @property null|float $indexPrice
 * @property null|float $markIv
 * @property null|float $underlyingPrice
 * @property null|float $openInterest
 * @property null|float $turnover24h
 * @property null|float $volume24h
 * @property null|float $totalVolume
 * @property null|float $totalTurnover
 * @property null|float $delta
 * @property null|float $gamma
 * @property null|float $vega
 * @property null|float $theta
 * @property null|float $predictedDeliveryPrice
 * @property null|float $change24h
 */
readonly class Option extends DTO
{
    public function casts(): array
    {
        return [
            'symbol' => StringCast::class,
            'bid1Price' => FloatCast::class,
            'bid1Size' => FloatCast::class,
            'bid1Iv' => FloatCast::class,
            'ask1Price' => FloatCast::class,
            'ask1Size' => FloatCast::class,
            'ask1Iv' => FloatCast::class,
            'lastPrice' => FloatCast::class,
            'highPrice24h' => FloatCast::class,
            'lowPrice24h' => FloatCast::class,
            'markPrice' => FloatCast::class,
            'indexPrice' => FloatCast::class,
            'markIv' => FloatCast::class,
            'underlyingPrice' => FloatCast::class,
            'openInterest' => FloatCast::class,
            'turnover24h' => FloatCast::class,
            'volume24h' => FloatCast::class,
            'totalVolume' => FloatCast::class,
            'totalTurnover' => FloatCast::class,
            'delta' => FloatCast::class,
            'gamma' => FloatCast::class,
            'vega' => FloatCast::class,
            'theta' => FloatCast::class,
            'predictedDeliveryPrice' => FloatCast::class,
            'change24h' => FloatCast::class,
        ];
    }
}
