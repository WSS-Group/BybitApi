<?php

namespace BybitApi\Enums;

enum OrderType: string
{
    case MARKET = 'Market';
    case LIMIT = 'Limit';
    case UNKNOWN = 'UNKNOWN';

    public function label(): string
    {
        return match ($this) {
            self::MARKET => __('bybit_api::enums.order_types.market'),
            self::LIMIT => __('bybit_api::enums.order_types.limit'),
            self::UNKNOWN => __('bybit_api::enums.order_types.unknown'),
        };
    }
}
