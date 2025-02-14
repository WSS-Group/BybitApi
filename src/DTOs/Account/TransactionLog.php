<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\Category;
use BybitApi\Enums\LogType;
use BybitApi\Enums\Side;

/**
 * @property null|string $id
 * @property null|string $symbol
 * @property null|Category $category
 * @property null|Side $side
 * @property null|\Illuminate\Support\Carbon $transactionTime
 * @property null|\BybitApi\Enums\LogType $type
 * @property null|float $qty
 * @property null|float $size
 * @property null|string $currency
 * @property null|float $tradePrice
 * @property null|float $funding
 * @property null|float $fee
 * @property null|float $cashFlow
 * @property null|float $change
 * @property null|float $cashBalance
 * @property null|float $feeRate
 * @property null|float $bonusChange
 * @property null|string $tradeId
 * @property null|string $orderId
 * @property null|string $orderLinkId
 */
class TransactionLog extends DTO
{
    public function aliases(): array
    {
        return ['coin' => 'coins'];
    }

    public function casts(): array
    {
        return [
            'id' => StringCast::class,
            'symbol' => StringCast::class,
            'category' => new EnumCast(Category::class),
            'side' => new EnumCast(Side::class, Side::NONE),
            'transactionTime' => TimestampMsCast::class,
            'type' => new EnumCast(LogType::class, LogType::OTHER),
            'qty' => FloatCast::class,
            'size' => FloatCast::class,
            'currency' => StringCast::class,
            'tradePrice' => FloatCast::class,
            'funding' => FloatCast::class,
            'fee' => FloatCast::class,
            'cashFlow' => FloatCast::class,
            'change' => FloatCast::class,
            'cashBalance' => FloatCast::class,
            'feeRate' => FloatCast::class,
            'bonusChange' => FloatCast::class,
            'tradeId' => StringCast::class,
            'orderId' => StringCast::class,
            'orderLinkId' => StringCast::class,
        ];
    }
}
