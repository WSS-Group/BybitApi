<?php

namespace BybitApi\Enums;

enum SelfMatchPreventionType: string
{
    case NONE = 'None';
    case CANCEL_MAKER = 'CancelMaker';
    case CANCEL_TAKER = 'CancelTaker';
    case CANCEL_BOTH = 'CancelBoth';
}