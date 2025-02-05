<?php

namespace BybitApi\Http\Integrations\Bybit\Entities\Orders;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\Enums\MarketUnit;
use BybitApi\Enums\OrderFilter;
use BybitApi\Enums\OrderType;
use BybitApi\Enums\PositionIndex;
use BybitApi\Enums\SelfMatchPreventionType;
use BybitApi\Enums\Side;
use BybitApi\Enums\TakeProfitStopLossMode;
use BybitApi\Enums\TimeInForce;
use BybitApi\Enums\TriggerBy;
use BybitApi\Enums\TriggerDirection;
use Illuminate\Contracts\Support\Arrayable;

readonly class PlaceIntent implements Arrayable
{
    public function __construct(
        public BackedEnum|string $symbol,
        public Side $side,
        public OrderType $orderType,
        public string $qty,
        public ?bool $isLeverage = null,
        public ?MarketUnit $marketUnit = null,
        public ?string $price = null,
        public ?TriggerDirection $triggerDirection = null,
        public ?OrderFilter $orderFilter = null,
        public ?string $triggerPrice = null,
        public ?TriggerBy $triggerBy = null,
        public ?string $orderIv = null,
        public ?TimeInForce $timeInForce = null,
        public ?PositionIndex $positionIdx = null,
        public ?string $orderLinkId = null,
        public ?string $takeProfit = null,
        public ?string $stopLoss = null,
        public ?TriggerBy $tpTriggerBy = null,
        public ?TriggerBy $slTriggerBy = null,
        public ?bool $reduceOnly = null,
        public ?bool $closeOnTrigger = null,
        public ?SelfMatchPreventionType $smpType = null,
        public ?bool $mmp = null,
        public ?TakeProfitStopLossMode $tpslMode = null,
        public ?string $tpLimitPrice = null,
        public ?string $slLimitPrice = null,
        public ?OrderType $tpOrderType = null,
        public ?OrderType $slOrderType = null,
    ) {
        //
    }

    public function toArray(): array
    {
        return Conditional::array([
            'symbol' => $this->symbol,
            'side' => $this->side,
            'orderType' => $this->orderType,
            'qty' => $this->qty,
            'isLeverage' => Conditional::ifNotNull($this->isLeverage),
            'marketUnit' => Conditional::ifNotNull($this->marketUnit),
            'price' => Conditional::ifNotNull($this->price),
            'triggerDirection' => Conditional::ifNotNull($this->triggerDirection),
            'orderFilter' => Conditional::ifNotNull($this->orderFilter),
            'triggerPrice' => Conditional::ifNotNull($this->triggerPrice),
            'triggerBy' => Conditional::ifNotNull($this->triggerBy),
            'orderIv' => Conditional::ifNotNull($this->orderIv),
            'timeInForce' => Conditional::ifNotNull($this->timeInForce),
            'positionIdx' => Conditional::ifNotNull($this->positionIdx),
            'orderLinkId' => Conditional::ifNotNull($this->orderLinkId),
            'takeProfit' => Conditional::ifNotNull($this->takeProfit),
            'stopLoss' => Conditional::ifNotNull($this->stopLoss),
            'tpTriggerBy' => Conditional::ifNotNull($this->tpTriggerBy),
            'slTriggerBy' => Conditional::ifNotNull($this->slTriggerBy),
            'reduceOnly' => Conditional::ifNotNull($this->reduceOnly),
            'closeOnTrigger' => Conditional::ifNotNull($this->closeOnTrigger),
            'smpType' => Conditional::ifNotNull($this->smpType),
            'mmp' => Conditional::ifNotNull($this->mmp),
            'tpslMode' => Conditional::ifNotNull($this->tpslMode),
            'tpLimitPrice' => Conditional::ifNotNull($this->tpLimitPrice),
            'slLimitPrice' => Conditional::ifNotNull($this->slLimitPrice),
            'tpOrderType' => Conditional::ifNotNull($this->tpOrderType),
            'slOrderType' => Conditional::ifNotNull($this->slOrderType),
        ]);
    }
}
