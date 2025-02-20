<?php

namespace BybitApi\DTOs\Market\InstrumentInfo\Spot;

use BcMath\Number;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Market\InstrumentInfo\BaseFilter;
use RoundingMode;

/**
 * @property null|float $tickSize
 */
class PriceFilter extends BaseFilter
{
    public function casts(): array
    {
        return [
            'tickSize' => FloatCast::class,
        ];
    }

    public function format(float $value, RoundingMode $roundMode): Number
    {
        return \Illuminate\Support\Number::roundAsMultipleOf(
            $value,
            $this->tickSize,
            $roundMode,
        );
    }
}
