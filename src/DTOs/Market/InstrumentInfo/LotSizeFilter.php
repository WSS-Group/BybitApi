<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|float $basePrecision
 * @property null|float $quotePrecision
 * @property null|float $minOrderAmt
 * @property null|float $maxOrderAmt
 * @property null|float $minNotionalValue
 * @property null|float $minOrderQty
 * @property null|float $maxOrderQty
 * @property null|float $maxMktOrderQty
 * @property null|float $qtyStep
 * @property null|float $postOnlyMaxOrderQty
 */
class LotSizeFilter extends DTO
{
    public function casts(): array
    {
        return [
            'basePrecision' => FloatCast::class,
            'quotePrecision' => FloatCast::class,
            'minOrderAmt' => FloatCast::class,
            'maxOrderAmt' => FloatCast::class,
            'minNotionalValue' => FloatCast::class,
            'minOrderQty' => FloatCast::class,
            'maxOrderQty' => FloatCast::class,
            'maxMktOrderQty' => FloatCast::class,
            'qtyStep' => FloatCast::class,
            'postOnlyMaxOrderQty' => FloatCast::class,
        ];
    }
}
