<?php

namespace BybitApi\DTOs\Trade;

use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $orderId
 * @property null|string $orderLinkId
 */
class CanceledOrder extends DTO
{
    public function casts(): array
    {
        return [
            'orderId' => StringCast::class,
            'orderLinkId' => StringCast::class,
        ];
    }
}
