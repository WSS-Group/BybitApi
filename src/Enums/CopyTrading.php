<?php

namespace BybitApi\Enums;

enum CopyTrading: string
{
    case NONE = 'none';
    case BOTH = 'both';
    case UTA_ONLY = 'utaOnly';
    case NORMAL_ONLY = 'normalOnly';
    case OTHER = 'other';
}
