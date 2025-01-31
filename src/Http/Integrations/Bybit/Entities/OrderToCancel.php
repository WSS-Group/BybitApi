<?php

namespace BybitApi\Http\Integrations\Bybit\Entities;

use BackedEnum;
use BybitApi\Conditional;
use Illuminate\Contracts\Support\Arrayable;

readonly class OrderToCancel implements Arrayable
{
    public function __construct(
        public BackedEnum|string $symbol,
        public ?string $orderId = null,
        public ?string $orderLinkId = null,
    ) {
        //
    }

    public function toArray(): array
    {
        return Conditional::array([
            'symbol' => $this->symbol,
            'orderId' => Conditional::ifNotEmpty($this->orderId),
            'orderLinkId' => Conditional::ifNotNull($this->orderLinkId),
        ]);
    }
}
