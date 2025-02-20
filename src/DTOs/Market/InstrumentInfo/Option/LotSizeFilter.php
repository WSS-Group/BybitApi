<?php

namespace BybitApi\DTOs\Market\InstrumentInfo\Option;

use BcMath\Number;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Market\InstrumentInfo\BaseFilter;
use RoundingMode;

/**
 * @property null|float $minOrderQty
 * @property null|float $maxOrderQty
 * @property null|float $qtyStep
 */
class LotSizeFilter extends BaseFilter
{
    public function casts(): array
    {
        return [
            'minOrderQty' => FloatCast::class,
            'maxOrderQty' => FloatCast::class,
            'qtyStep' => FloatCast::class,
        ];
    }

    public function format(float $value, RoundingMode $roundMode): Number
    {
        return \Illuminate\Support\Number::roundAsMultipleOf(
            $value,
            $this->qtyStep,
            $roundMode,
            $this->minOrderQty,
            $this->maxOrderQty,
        );
    }
}
