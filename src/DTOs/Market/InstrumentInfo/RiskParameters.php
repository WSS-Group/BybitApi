<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|float $priceLimitRatioX
 * @property null|float $priceLimitRatioY
 */
class RiskParameters extends DTO
{
    public function casts(): array
    {
        return [
            'priceLimitRatioX' => FloatCast::class,
            'priceLimitRatioY' => FloatCast::class,
        ];
    }
}
