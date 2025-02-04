<?php

namespace BybitApi\DTOs\Trade;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\OrderSide;

/**
 * @property null|string $symbol
 * @property null|OrderSide $side
 * @property null|float $maxTradeQty
 * @property null|float $maxTradeAmount
 * @property null|float $spotMaxTradeQty
 * @property null|float $spotMaxTradeAmount
 * @property null|string $borrowCoin
 */
class BorrowQuota extends DTO
{
    public function casts(): array
    {
        return [
            'symbol' => StringCast::class,
            'side' => new EnumCast(OrderSide::class),
            'maxTradeQty' => FloatCast::class,
            'maxTradeAmount' => FloatCast::class,
            'spotMaxTradeQty' => FloatCast::class,
            'spotMaxTradeAmount' => FloatCast::class,
            'borrowCoin' => StringCast::class,
        ];
    }
}
