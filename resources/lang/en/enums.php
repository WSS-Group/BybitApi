<?php

return [

    /*
    |--------------------------------------------------------------------------
    | BybitApi Language Lines
    |--------------------------------------------------------------------------
    |
    */

    'categories' => [
        'spot' => 'spot',
        'linear' => 'linear',
        'inverse' => 'inverse',
        'option' => 'option',
    ],
    'intervals' => [
        '1_minute' => '1 minute',
        '3_minutes' => '3 minutes',
        '5_minutes' => '5 minutes',
        '15_minutes' => '15 minutes',
        '30_minutes' => '30 minutes',
        '60_minutes' => '60 minutes',
        '120_minutes' => '120 minutes',
        '240_minutes' => '240 minutes',
        '360_minutes' => '360 minutes',
        '720_minutes' => '720 minutes',
        '1_day' => '1 day',
        '1_week' => '1 week',
        '1_month' => '1 month',
    ],
    'order_statuses' => [
        'new' => 'new',
        'partially_filled' => 'partially filled',
        'untriggered' => 'untriggered',
        'rejected' => 'rejected',
        'partially_filled_canceled' => 'partially filled and canceled',
        'filled' => 'filled',
        'cancelled' => 'cancelled',
        'triggered' => 'triggered',
        'deactivated' => 'deactivated',
    ],
    'order_types' => [
        'market' => 'market',
        'limit' => 'limit',
        'unknown' => 'unknown',
    ],
    'products' => [
        'options' => 'options',
        'derivatives' => 'derivatives',
        'spot' => 'spot',
    ],
    'sides' => [
        'buy' => 'buy',
        'sell' => 'sell',
    ],
    'stop_order_types' => [
        'take_profit' => 'take profit',
        'stop_loss' => 'stop loss',
        'trailing_stop' => 'trailing stop',
        'stop' => 'stop',
        'partial_take_profit' => 'partial take profit',
        'partial_stop_loss' => 'partial stop loss',
        'tp_sl_order' => 'take profit stop loss order',
        'oco_order' => 'oco order',
        'mm_rate_close' => 'mm rate close',
        'bidirectional_tp_sl_order' => 'bidirectional take profit stop loss order',
    ],
    'symbol_statuses' => [
        'pre_launch' => 'pre launch',
        'trading' => 'trading',
        'delivering' => 'delivering',
        'closed' => 'closed',
    ],
    'transfer_statuses' => [
        'unknown' => 'unknown',
        'success' => 'success',
        'pending' => 'pending',
        'failed' => 'failed',
    ],
    'withdraw_statuses' => [
        'security_check' => 'security check',
        'pending' => 'pending',
        'success' => 'success',
        'cancel_by_user' => 'canceled by user',
        'reject' => 'reject',
        'fail' => 'fail',
        'blockchain_confirmed' => 'blockchain confirmed',
        'more_information_required' => 'more information required',
        'unknown' => 'unknown',
    ],
];
