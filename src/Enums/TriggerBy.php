<?php

namespace BybitApi\Enums;

enum TriggerBy: string
{
    case LAST_PRICE = 'LastPrice';
    case INDEX_PRICE = 'IndexPrice';
    case MARK_PRICE = 'MarkPrice';
}
