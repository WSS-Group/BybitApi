<?php

namespace BybitApi\DTOs\Position;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\DTOs\DTO;

/**
 * @property \Illuminate\Support\Carbon $startTime
 * @property null|float $openPrice
 * @property null|float $highPrice
 * @property null|float $lowPrice
 * @property null|float $closePrice
 * @property null|float $volume
 * @property null|float $turnover
 */
class Info extends DTO
{


    public function casts(): array
    {
        return [
            'startTime' => TimestampCast::class,
            'openPrice' => FloatCast::class,
            'highPrice' => FloatCast::class,
            'lowPrice' => FloatCast::class,
            'closePrice' => FloatCast::class,
            'volume' => FloatCast::class,
            'turnover' => FloatCast::class,
        ];
    }
}
