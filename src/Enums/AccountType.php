<?php

namespace BybitApi\Enums;

use LaravelToolkit\Enum\ArrayableEnum;
use LaravelToolkit\Enum\HasArrayableEnum;

enum AccountType: string implements ArrayableEnum
{
    use HasArrayableEnum;

    case UNIFIED = 'UNIFIED';
    case FUND = 'FUND';
    case CONTRACT = 'CONTRACT';
    case SPOT = 'SPOT';
    case OTHER = 'OTHER';

    public function label(): string
    {
        return match ($this) {
            self::UNIFIED => __('bybit_api::enums.account_types.unified'),
            self::FUND => __('bybit_api::enums.account_types.fund'),
            self::CONTRACT => __('bybit_api::enums.account_types.contract'),
            self::SPOT => __('bybit_api::enums.account_types.spot'),
            self::OTHER => __('bybit_api::enums.account_types.other'),
        };
    }
}
