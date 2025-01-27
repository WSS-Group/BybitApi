<?php

namespace BybitApi\DTOs;

use Illuminate\Support\Carbon;

/**
 * @property \Illuminate\Support\Carbon $startTime
 */
readonly class Kline
{
    public function __construct(
        public int $startMsTimestamp,
        public float $openPrice,
        public float $highPrice,
        public float $lowPrice,
        public float $closePrice,
        public float $volume,
        public float $turnover,
    ) {
        //
    }

    public function __get(string $name)
    {
        if ($name === 'startTime') {
            return Carbon::createFromTimestampMs($this->startMsTimestamp)
                ->setTimezone(config('app.timezone'));
        }
    }
}