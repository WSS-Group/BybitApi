<?php

namespace BybitApi\Enums;

enum StopOrderType: string
{
    case TAKE_PROFIT = 'TakeProfit';
    case STOP_LOSS = 'StopLoss';
    case TRAILING_STOP = 'TrailingStop';
    case STOP = 'Stop';
    case PARTIAL_TAKE_PROFIT = 'PartialTakeProfit';
    case PARTIAL_STOP_LOSS = 'PartialStopLoss';
    case TP_SL_ORDER = 'tpslOrder';
    case OCO_ORDER = 'OcoOrder';
    case MM_RATE_CLOSE = 'MmRateClose';
    case BIDIRECTIONAL_TP_SL_ORDER = 'BidirectionalTpslOrder';

    public function label(): string
    {
        return match ($this) {
            self::TAKE_PROFIT => __('bybit_api::enums.stop_order_types.take_profit'),
            self::STOP_LOSS => __('bybit_api::enums.stop_order_types.stop_loss'),
            self::TRAILING_STOP => __('bybit_api::enums.stop_order_types.trailing_stop'),
            self::STOP => __('bybit_api::enums.stop_order_types.stop'),
            self::PARTIAL_TAKE_PROFIT => __('bybit_api::enums.stop_order_types.partial_take_profit'),
            self::PARTIAL_STOP_LOSS => __('bybit_api::enums.stop_order_types.partial_stop_loss'),
            self::TP_SL_ORDER => __('bybit_api::enums.stop_order_types.tp_sl_order'),
            self::OCO_ORDER => __('bybit_api::enums.stop_order_types.oco_order'),
            self::MM_RATE_CLOSE => __('bybit_api::enums.stop_order_types.mm_rate_close'),
            self::BIDIRECTIONAL_TP_SL_ORDER => __('bybit_api::enums.stop_order_types.bidirectional_tp_sl_order'),
        };
    }
}
