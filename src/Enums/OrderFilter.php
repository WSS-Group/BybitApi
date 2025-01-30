<?php

namespace BybitApi\Enums;

enum OrderFilter: string
{
    case ORDER = 'Order';
    case TP_SL_ORDER = 'tpslOrder';
    case STOP_ORDER = 'StopOrder';
}