<?php

namespace BybitApi\Enums;

enum MarginTrading: string
{
    case NONE = 'none';
    case BOTH = 'both';
    case UTA_ONLY = 'utaOnly';
    case NORMAL_SPOT_ONLY = 'normalSpotOnly';
    case OTHER = 'other';
}
