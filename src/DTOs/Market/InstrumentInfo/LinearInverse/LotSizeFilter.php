<?php

namespace BybitApi\DTOs\Market\InstrumentInfo\LinearInverse;

use BcMath\Number;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Market\InstrumentInfo\BaseFilter;
use RoundingMode;

/**
 * @property null|float $minNotionalValue
 * @property null|float $minOrderQty
 * @property null|float $maxOrderQty
 * @property null|float $maxMktOrderQty
 * @property null|float $qtyStep
 * @property null|float $postOnlyMaxOrderQty
 */
class LotSizeFilter extends BaseFilter
{
    public function casts(): array
    {
        return [
            'minNotionalValue' => FloatCast::class,
            'minOrderQty' => FloatCast::class,
            'maxOrderQty' => FloatCast::class,
            'maxMktOrderQty' => FloatCast::class,
            'qtyStep' => FloatCast::class,
            'postOnlyMaxOrderQty' => FloatCast::class,
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
