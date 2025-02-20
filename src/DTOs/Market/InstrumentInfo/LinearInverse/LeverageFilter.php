<?php

namespace BybitApi\DTOs\Market\InstrumentInfo\LinearInverse;

use BcMath\Number;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Market\InstrumentInfo\BaseFilter;
use RoundingMode;

/**
 * @property null|float $minLeverage
 * @property null|float $maxLeverage
 * @property null|float $leverageStep
 */
class LeverageFilter extends BaseFilter
{
    public function casts(): array
    {
        return [
            'minLeverage' => FloatCast::class,
            'maxLeverage' => FloatCast::class,
            'leverageStep' => FloatCast::class,
        ];
    }

    public function format(float $value, RoundingMode $roundMode): Number
    {
        return \Illuminate\Support\Number::roundAsMultipleOf(
            $value,
            $this->leverageStep,
            $roundMode,
            $this->minLeverage,
            $this->maxLeverage,
        );
    }
}
