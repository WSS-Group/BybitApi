<?php

namespace BybitApi\Enums;

enum SymbolStatus: string
{
    case PRE_LAUNCH = 'PreLaunch';
    case TRADING = 'Trading';
    case DELIVERING = 'Delivering';
    case CLOSED = 'Closed';

    public function label(): string
    {
        return match ($this) {
            self::PRE_LAUNCH => __('bybit_api::symbol_statuses.pre_launch'),
            self::TRADING => __('bybit_api::symbol_statuses.trading'),
            self::DELIVERING => __('bybit_api::symbol_statuses.delivering'),
            self::CLOSED => __('bybit_api::symbol_statuses.closed'),
        };
    }
}
