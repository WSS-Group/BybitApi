<?php

namespace BybitApi\Http\Integrations\Bybit\Entities\Orders;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\Enums\TakeProfitStopLossMode;
use BybitApi\Enums\TriggerBy;
use Illuminate\Contracts\Support\Arrayable;

readonly class AmendIntent implements Arrayable
{
    public function __construct(
        public BackedEnum|string $symbol,
        public ?string $orderId = null,
        public ?string $orderLinkId = null,
        public ?string $orderIv = null,
        public ?string $triggerPrice = null,
        public ?string $qty = null,
        public ?string $price = null,
        public ?TakeProfitStopLossMode $tpslMode = null,
        public ?string $takeProfit = null,
        public ?string $stopLoss = null,
        public ?TriggerBy $tpTriggerBy = null,
        public ?TriggerBy $slTriggerBy = null,
        public ?TriggerBy $triggerBy = null,
        public ?string $tpLimitPrice = null,
        public ?string $slLimitPrice = null,
    ) {
        //
    }

    public function toArray(): array
    {
        return Conditional::array([
            'symbol' => $this->symbol,
            'orderId' => Conditional::ifNotEmpty($this->orderId),
            'orderLinkId' => Conditional::ifNotEmpty($this->orderLinkId),
            'orderIv' => Conditional::ifNotNull($this->orderIv),
            'triggerPrice' => Conditional::ifNotNull($this->triggerPrice),
            'qty' => Conditional::ifNotNull($this->qty),
            'price' => Conditional::ifNotNull($this->price),
            'tpslMode' => Conditional::ifNotNull($this->tpslMode),
            'takeProfit' => Conditional::ifNotNull($this->takeProfit),
            'stopLoss' => Conditional::ifNotNull($this->stopLoss),
            'tpTriggerBy' => Conditional::ifNotNull($this->tpTriggerBy),
            'slTriggerBy' => Conditional::ifNotNull($this->slTriggerBy),
            'triggerBy' => Conditional::ifNotNull($this->triggerBy),
            'tpLimitPrice' => Conditional::ifNotNull($this->tpLimitPrice),
            'slLimitPrice' => Conditional::ifNotNull($this->slLimitPrice),
        ]);
    }
}
