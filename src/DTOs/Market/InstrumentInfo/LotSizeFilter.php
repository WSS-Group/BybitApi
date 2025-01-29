<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|float $minNotionalValue
 * @property null|float $maxOrderQty
 * @property null|float $maxMktOrderQty
 * @property null|float $minOrderQty
 * @property null|float $qtyStep
 * @property null|float $postOnlyMaxOrderQty
 */
readonly class LotSizeFilter extends DTO
{

    public function casts(): array
    {
        return [
            'minNotionalValue' => FloatCast::class,
            'maxOrderQty' => FloatCast::class,
            'maxMktOrderQty' => FloatCast::class,
            'minOrderQty' => FloatCast::class,
            'qtyStep' => FloatCast::class,
            'postOnlyMaxOrderQty' => FloatCast::class,
        ];
    }
}
