<?php

namespace BybitApi\Enums;

enum TradeMode: int
{
    case CROSS_MARGIN = 0;
    case ISOLATED_MARGIN = 1;
}
