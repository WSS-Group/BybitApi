<?php

namespace BybitApi\Enums;

enum UnifiedMarginStatus: int
{
    case CLASSIC = 1;
    case UNIFIED_1 = 3;
    case UNIFIED_1_PRO = 4;
    case UNIFIED_2 = 5;
    case UNIFIED_2_PRO = 6;
}
