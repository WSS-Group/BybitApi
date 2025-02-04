<?php

namespace BybitApi\DTOs\Trade;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\CancelType;
use BybitApi\Enums\CreateType;
use BybitApi\Enums\OrderSide;
use BybitApi\Enums\OrderStatus;
use BybitApi\Enums\OrderType;
use BybitApi\Enums\PositionIndex;
use BybitApi\Enums\RejectReason;
use BybitApi\Enums\SelfMatchPreventionType;
use BybitApi\Enums\StopOrderType;
use BybitApi\Enums\TakeProfitStopLossMode;
use BybitApi\Enums\TimeInForce;
use BybitApi\Enums\TriggerBy;
use BybitApi\Enums\TriggerDirection;

/**
 * @property null|string $orderId
 * @property null|string $orderLinkId
 * @property null|string $blockTradeId
 * @property null|string $symbol
 * @property null|float $price
 * @property null|float $qty
 * @property null|OrderSide $side
 * @property null|bool $isLeverage
 * @property null|PositionIndex $positionIdx
 * @property null|OrderStatus $orderStatus
 * @property null|CreateType $createType
 * @property null|CancelType $cancelType
 * @property null|RejectReason $rejectReason
 * @property null|float $avgPrice
 * @property null|float $leavesQty
 * @property null|float $leavesValue
 * @property null|float $cumExecQty
 * @property null|float $cumExecValue
 * @property null|float $cumExecFee
 * @property null|TimeInForce $timeInForce
 * @property null|OrderType $orderType
 * @property null|string $stopOrderType
 * @property null|string $orderIv
 * @property null|string $marketUnit
 * @property null|float $triggerPrice
 * @property null|float $takeProfit
 * @property null|float $stopLoss
 * @property null|TakeProfitStopLossMode $tpslMode
 * @property null|string $ocoTriggerBy
 * @property null|float $tpLimitPrice
 * @property null|float $slLimitPrice
 * @property null|TriggerBy $tpTriggerBy
 * @property null|TriggerBy $slTriggerBy
 * @property null|TriggerDirection $triggerDirection
 * @property null|TriggerBy $triggerBy
 * @property null|float $lastPriceOnCreated
 * @property null|bool $reduceOnly
 * @property null|bool $closeOnTrigger
 * @property null|string $placeType
 * @property null|SelfMatchPreventionType $smpType
 * @property null|string $smpGroup
 * @property null|string $smpOrderId
 * @property null|\Illuminate\Support\Carbon $createdTime
 * @property null|\Illuminate\Support\Carbon $updatedTime
 */
class Order extends DTO
{

    public function casts(): array
    {
        return [
            'orderId' => StringCast::class,
            'orderLinkId' => StringCast::class,
            'blockTradeId' => StringCast::class,
            'symbol' => StringCast::class,
            'price' => FloatCast::class,
            'qty' => FloatCast::class,
            'side' => new EnumCast(OrderSide::class),
            'isLeverage' => BooleanCast::class,
            'positionIdx' => new EnumCast(PositionIndex::class),
            'orderStatus' => new EnumCast(OrderStatus::class),
            'createType' => new EnumCast(CreateType::class),
            'cancelType' => new EnumCast(CancelType::class),
            'rejectReason' => new EnumCast(RejectReason::class),
            'avgPrice' => FloatCast::class,
            'leavesQty' => FloatCast::class,
            'leavesValue' => FloatCast::class,
            'cumExecQty' => FloatCast::class,
            'cumExecValue' => FloatCast::class,
            'cumExecFee' => FloatCast::class,
            'timeInForce' => new EnumCast(TimeInForce::class),
            'orderType' => new EnumCast(OrderType::class),
            'stopOrderType' => new EnumCast(StopOrderType::class),
            'orderIv' => StringCast::class,
            'marketUnit' => StringCast::class,
            'triggerPrice' => FloatCast::class,
            'takeProfit' => FloatCast::class,
            'stopLoss' => FloatCast::class,
            'tpslMode' => new EnumCast(TakeProfitStopLossMode::class),
            'ocoTriggerBy' => StringCast::class,
            'tpLimitPrice' => FloatCast::class,
            'slLimitPrice' => FloatCast::class,
            'tpTriggerBy' => new EnumCast(TriggerBy::class),
            'slTriggerBy' => new EnumCast(TriggerBy::class),
            'triggerDirection' => new EnumCast(TriggerDirection::class),
            'triggerBy' => new EnumCast(TriggerBy::class),
            'lastPriceOnCreated' => FloatCast::class,
            'reduceOnly' => BooleanCast::class,
            'closeOnTrigger' => BooleanCast::class,
            'placeType' => StringCast::class,
            'smpType' => new EnumCast(SelfMatchPreventionType::class),
            'smpGroup' => StringCast::class,
            'smpOrderId' => StringCast::class,
            'createdTime' => TimestampCast::class,
            'updatedTime' => TimestampCast::class,
        ];
    }
}
