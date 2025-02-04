<?php

namespace BybitApi\DTOs\Trade;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\CreateType;
use BybitApi\Enums\ExecType;
use BybitApi\Enums\OrderSide;
use BybitApi\Enums\OrderType;
use BybitApi\Enums\StopOrderType;

/**
 * @property null|string $symbol
 * @property null|string $orderId
 * @property null|string $orderLinkId
 * @property null|OrderSide $side
 * @property null|float $orderPrice
 * @property null|float $orderQty
 * @property null|float $leavesQty
 * @property null|CreateType $createType
 * @property null|OrderType $orderType
 * @property null|StopOrderType $stopOrderType
 * @property null|float $execFee
 * @property null|string $execId
 * @property null|float $execPrice
 * @property null|float $execQty
 * @property null|ExecType $execType
 * @property null|float $execValue
 * @property null|\Illuminate\Support\Carbon $execTime
 * @property null|string $feeCurrency
 * @property null|bool $isMaker
 * @property null|float $feeRate
 * @property null|string $tradeIv
 * @property null|string $markIv
 * @property null|float $markPrice
 * @property null|float $indexPrice
 * @property null|float $underlyingPrice
 * @property null|string $blockTradeId
 * @property null|float $closedSize
 * @property null|string $marketUnit
 * @property null|int $seq
 */
class TradeHistoryOrder extends DTO
{
    public function casts(): array
    {
        return [
            'symbol' => StringCast::class,
            'orderId' => StringCast::class,
            'orderLinkId' => StringCast::class,
            'side' => new EnumCast(OrderSide::class),
            'orderPrice' => FloatCast::class,
            'orderQty' => FloatCast::class,
            'leavesQty' => FloatCast::class,
            'createType' => new EnumCast(CreateType::class),
            'orderType' => new EnumCast(OrderType::class),
            'stopOrderType' => new EnumCast(StopOrderType::class),
            'execFee' => FloatCast::class,
            'execId' => StringCast::class,
            'execPrice' => FloatCast::class,
            'execQty' => FloatCast::class,
            'execType' => new EnumCast(ExecType::class),
            'execValue' => FloatCast::class,
            'execTime' => TimestampCast::class,
            'feeCurrency' => StringCast::class,
            'isMaker' => BooleanCast::class,
            'feeRate' => FloatCast::class,
            'tradeIv' => StringCast::class,
            'markIv' => StringCast::class,
            'markPrice' => FloatCast::class,
            'indexPrice' => FloatCast::class,
            'underlyingPrice' => FloatCast::class,
            'blockTradeId' => StringCast::class,
            'closedSize' => FloatCast::class,
            'marketUnit' => StringCast::class,
            'seq' => IntCast::class,
        ];
    }
}

