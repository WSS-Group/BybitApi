<?php

namespace BybitApi\Enums;

enum Side: string
{
    case BUY = 'Buy';
    case SELL = 'Sell';

    public function label(): string
    {
        return match ($this) {
            self::BUY => __('bybit_api::enums.sides.buy'),
            self::SELL => __('bybit_api::enums.sides.sell'),
        };
    }
}
