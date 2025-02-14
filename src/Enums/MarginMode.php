<?php

namespace BybitApi\Enums;

enum MarginMode: string
{
    case ISOLATED_MARGIN = 'ISOLATED_MARGIN';
    case REGULAR_MARGIN = 'REGULAR_MARGIN';
    case PORTFOLIO_MARGIN = 'PORTFOLIO_MARGIN';
}
