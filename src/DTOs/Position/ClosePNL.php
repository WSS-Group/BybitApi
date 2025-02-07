<?php

namespace BybitApi\DTOs\Position;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\ExecType;
use BybitApi\Enums\OrderType;
use BybitApi\Enums\Side;

/**
 * @property null|string $symbol
 * @property null|string $orderId
 * @property null|Side $side
 * @property null|float $qty
 * @property null|float $orderPrice
 * @property null|OrderType $orderType
 * @property null|ExecType $execType
 * @property null|float $closedSize
 * @property null|float $cumEntryValue
 * @property null|float $avgEntryPrice
 * @property null|float $cumExitValue
 * @property null|float $avgExitPrice
 * @property null|float $closedPnl
 * @property null|int $fillCount
 * @property null|float $leverage
 * @property null|\Illuminate\Support\Carbon $createdTime
 * @property null|\Illuminate\Support\Carbon $updatedTime
 */
class ClosePNL extends DTO
{
    public function casts(): array
    {
        return [
            'symbol' => StringCast::class,
            'orderId' => StringCast::class,
            'side' => new EnumCast(Side::class),
            'qty' => FloatCast::class,
            'orderPrice' => FloatCast::class,
            'orderType' => new EnumCast(OrderType::class),
            'execType' => new EnumCast(ExecType::class),
            'closedSize' => FloatCast::class,
            'cumEntryValue' => FloatCast::class,
            'avgEntryPrice' => FloatCast::class,
            'cumExitValue' => FloatCast::class,
            'avgExitPrice' => FloatCast::class,
            'closedPnl' => FloatCast::class,
            'fillCount' => IntCast::class,
            'leverage' => FloatCast::class,
            'createdTime' => TimestampMsCast::class,
            'updatedTime' => TimestampMsCast::class,
        ];
    }
}
