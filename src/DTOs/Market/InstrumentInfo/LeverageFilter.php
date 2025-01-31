<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|float $minLeverage
 * @property null|float $maxLeverage
 * @property null|float $leverageStep
 */
class LeverageFilter extends DTO
{
    public function casts(): array
    {
        return [
            'minLeverage' => FloatCast::class,
            'maxLeverage' => FloatCast::class,
            'leverageStep' => FloatCast::class,
        ];
    }
}
