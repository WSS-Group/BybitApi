<?php

namespace BybitApi\DTOs\Trade;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\Category;

/**
 * @property null|int $code
 * @property null|string $msg
 * @property null|Category $category
 * @property null|string $symbol
 * @property null|string $orderId
 * @property null|string $orderLinkId
 * @property null|\Illuminate\Support\Carbon $createAt
 */
class BatchAmendedOrder extends DTO
{
    public function casts(): array
    {
        return [
            'code' => IntCast::class,
            'msg' => StringCast::class,
            'category' => new EnumCast(Category::class),
            'symbol' => StringCast::class,
            'orderId' => StringCast::class,
            'orderLinkId' => StringCast::class,
            'createAt' => TimestampCast::class,
        ];
    }
}
