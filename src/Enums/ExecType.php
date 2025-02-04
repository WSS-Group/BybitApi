<?php

namespace BybitApi\Enums;

enum ExecType: string
{
    case TRADE = 'Trade';
    case ADL_TRADE = 'AdlTrade';
    case FUNDING = 'Funding';
    case BUST_TRADE = 'BustTrade';
    case DELIVERY = 'Delivery';
    case SETTLE = 'Settle';
    case BLOCK_TRADE = 'BlockTrade';
    case MOVE_POSITION = 'MovePosition';
    case UNKNOWN = 'UNKNOWN';
}









