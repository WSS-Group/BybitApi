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
        'inverse' => 'inverso',
        'option' => 'opção',
    ],
    'intervals' => [
        '1_minute' => '1 minuto',
        '3_minutes' => '3 minutos',
        '5_minutes' => '5 minutos',
        '15_minutes' => '15 minutos',
        '30_minutes' => '30 minutos',
        '60_minutes' => '60 minutos',
        '120_minutes' => '120 minutos',
        '240_minutes' => '240 minutos',
        '360_minutes' => '360 minutos',
        '720_minutes' => '720 minutos',
        '1_day' => '1 dia',
        '1_week' => '1 semana',
        '1_month' => '1 mês',
    ],
    'order_sides' => [
        'buy' => 'compra',
        'sell' => 'venda',
    ],
    'order_types' => [
        'market' => 'mercado',
        'limit' => 'limite',
        'unknown' => 'desconhecido',
    ],
    'products' => [
        'options' => 'opções',
        'derivatives' => 'derivativos',
        'spot' => 'spot',
    ],
    'stop_order_types' => [
        'take_profit' => 'obter lucro',
        'stop_loss' => 'cessar a perda',
        'trailing_stop' => 'parada móvel',
        'stop' => 'parada',
        'partial_take_profit' => 'lucro parcial',
        'partial_stop_loss' => 'cessar perda parcial',
        'tp_sl_order' => 'ordem obter lucro e cessar perda',
        'oco_order' => 'ordem oco',
        'mm_rate_close' => 'mm rate close',
        'bidirectional_tp_sl_order' => 'ordem obter lucro e cessar perda bidirecional',
    ],
    'symbol_statuses' => [
        'pre_launch' => 'pré lançamento',
        'trading' => 'negociando',
        'delivering' => 'entregando',
        'closed' => 'fechado',
    ],
];
