<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\Side;

/**
 * @property null|\Illuminate\Support\Carbon $deliveryTime
 * @property null|string $symbol
 * @property null|\BybitApi\Enums\Side $side
 * @property null|float $position
 * @property null|float $deliveryPrice
 * @property null|float $strike
 * @property null|float $fee
 * @property null|float $deliveryRpl
 */
class DeliveryRecord extends DTO
{
    public function casts(): array
    {
        return [
            'deliveryTime' => TimestampMsCast::class,
            'symbol' => StringCast::class,
            'side' => new EnumCast(Side::class),
            'position' => FloatCast::class,
            'deliveryPrice' => FloatCast::class,
            'strike' => FloatCast::class,
            'fee' => FloatCast::class,
            'deliveryRpl' => FloatCast::class,
        ];
    }
}
