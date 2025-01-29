<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|float $minPrice
 * @property null|float $maxPrice
 * @property null|float $tickSize
 */
readonly class PriceFilter extends DTO
{

    public function casts(): array
    {
        return [
            'minPrice' => FloatCast::class,
            'maxPrice' => FloatCast::class,
            'tickSize' => FloatCast::class,
        ];
    }
}
