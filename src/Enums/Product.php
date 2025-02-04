<?php

namespace BybitApi\Enums;

enum Product: string
{
    case OPTIONS = 'OPTIONS';
    case DERIVATIVES = 'DERIVATIVES';
    case SPOT = 'SPOT';

    public function label(): string
    {
        return match ($this) {
            self::OPTIONS => __('bybit_api::enums.products.options'),
            self::DERIVATIVES => __('bybit_api::enums.products.derivatives'),
            self::SPOT => __('bybit_api::enums.products.spot'),
        };
    }
}
