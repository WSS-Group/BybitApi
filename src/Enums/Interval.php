<?php

namespace BybitApi\Enums;

enum Interval: string
{
    case M1 = '1';
    case M3 = '3';
    case M5 = '5';
    case M15 = '15';
    case M30 = '30';
    case M60 = '60';
    case M120 = '120';
    case M240 = '240';
    case M360 = '360';
    case M720 = '720';
    case D = 'D';
    case W = 'W';
    case M = 'M';

    public function label(): string
    {
        return match ($this) {
            self::M1 => __('bybit_api::intervals.1_minute'),
            self::M3 => __('bybit_api::intervals.3_minutes'),
            self::M5 => __('bybit_api::intervals.5_minutes'),
            self::M15 => __('bybit_api::intervals.15_minutes'),
            self::M30 => __('bybit_api::intervals.30_minutes'),
            self::M60 => __('bybit_api::intervals.60_minutes'),
            self::M120 => __('bybit_api::intervals.120_minutes'),
            self::M240 => __('bybit_api::intervals.240_minutes'),
            self::M360 => __('bybit_api::intervals.360_minutes'),
            self::M720 => __('bybit_api::intervals.720_minutes'),
            self::D => __('bybit_api::intervals.1_day'),
            self::W => __('bybit_api::intervals.1_week'),
            self::M => __('bybit_api::intervals.1_month'),
        };
    }
}
