<?php

namespace BybitApi\DTOs\Market\Orderbook;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|float $price
 * @property null|float $size
 */
abstract class Item extends DTO
{
    public function aliases(): array
    {
        return [
            0 => 'price',
            1 => 'size',
        ];
    }

    public function casts(): array
    {
        return [
            'price' => FloatCast::class,
            'size' => FloatCast::class,
        ];
    }
}
