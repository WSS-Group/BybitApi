<?php

namespace BybitApi\Enums;

enum PositionIndex: int
{
    case ONE_WAY = 0;
    case EDGE_BUY = 1;
    case EDGE_SELL = 2;
}