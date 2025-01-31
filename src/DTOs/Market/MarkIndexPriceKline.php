<?php

namespace BybitApi\DTOs\Market;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\DTOs\DTO;

/**
 * @property \Illuminate\Support\Carbon $startTime
 * @property null|float $openPrice
 * @property null|float $highPrice
 * @property null|float $lowPrice
 * @property null|float $closePrice
 */
class MarkIndexPriceKline extends DTO
{
    public function aliases(): array
    {
        return [
            0 => 'startTime',
            1 => 'openPrice',
            2 => 'highPrice',
            3 => 'lowPrice',
            4 => 'closePrice',
        ];
    }

    public function casts(): array
    {
        return [
            'startTime' => TimestampCast::class,
            'openPrice' => FloatCast::class,
            'highPrice' => FloatCast::class,
            'lowPrice' => FloatCast::class,
            'closePrice' => FloatCast::class,
        ];
    }
}
