<?php

namespace BybitApi\Enums;

enum Category: string
{
    case SPOT = 'spot';
    case LINEAR = 'linear';
    case INVERSE = 'inverse';
    case OPTION = 'option';

    public function label(): string
    {
        return match ($this) {
            self::SPOT => __('bybit_api::enums.categories.spot'),
            self::LINEAR => __('bybit_api::enums.categories.linear'),
            self::INVERSE => __('bybit_api::enums.categories.inverse'),
            self::OPTION => __('bybit_api::enums.categories.option'),
        };
    }
}
