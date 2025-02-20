<?php

namespace BybitApi\DTOs\Market\InstrumentInfo\Spot;

use BcMath\Number;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Market\InstrumentInfo\BaseFilter;
use RoundingMode;

/**
 * @property null|float $basePrecision
 * @property null|float $quotePrecision
 * @property null|float $minOrderAmt
 * @property null|float $maxOrderAmt
 * @property null|float $minOrderQty
 * @property null|float $maxOrderQty
 */
class LotSizeFilter extends BaseFilter
{
    public function casts(): array
    {
        return [
            'basePrecision' => FloatCast::class,
            'quotePrecision' => FloatCast::class,
            'minOrderAmt' => FloatCast::class,
            'maxOrderAmt' => FloatCast::class,
            'minOrderQty' => FloatCast::class,
            'maxOrderQty' => FloatCast::class,
        ];
    }

    public function format(float $value, RoundingMode $roundMode): Number
    {
        return \Illuminate\Support\Number::roundAsMultipleOf(
            $value,
            $this->basePrecision,
            $roundMode,
            $this->minOrderQty,
            $this->maxOrderQty,
        );
    }
}
