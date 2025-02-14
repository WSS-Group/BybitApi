<?php

namespace BybitApi\Enums;

enum Side: string
{
    case BUY = 'Buy';
    case SELL = 'Sell';
    case NONE = 'None';

    public function label(): string
    {
        return match ($this) {
            self::BUY => __('bybit_api::enums.sides.buy'),
            self::SELL => __('bybit_api::enums.sides.sell'),
            self::NONE => __('bybit_api::enums.sides.none'),
        };
    }
}
