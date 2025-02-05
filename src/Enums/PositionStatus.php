<?php

namespace BybitApi\Enums;

enum PositionStatus: string
{
    case NORMAL = 'Normal';
    case LIQ = 'Liq';
    case ADL = 'Adl';
}
