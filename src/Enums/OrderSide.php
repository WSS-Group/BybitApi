<?php

namespace BybitApi\Enums;

enum OrderSide: string
{
    case BUY = 'Buy';
    case SELL = 'Sell';

    public function label(): string
    {
        return match ($this) {
            self::BUY => __('bybit_api::enums.order_sides.buy'),
            self::SELL => __('bybit_api::enums.order_sides.sell'),
        };
    }
}
