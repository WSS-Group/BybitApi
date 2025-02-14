<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\Product;

/**
 * @property null|Product $product
 * @property null|string $dcpStatus
 * @property null|int $timeWindow
 */
class DcpInfo extends DTO
{
    public function casts(): array
    {
        return [
            'product' => new EnumCast(Product::class),
            'dcpStatus' => StringCast::class,
            'timeWindow' => IntCast::class,
        ];
    }
}
