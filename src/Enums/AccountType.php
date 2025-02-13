<?php

namespace BybitApi\Enums;

enum AccountType: string
{
    case UNIFIED = 'UNIFIED';
    case FUND = 'FUND';
    case CONTRACT = 'CONTRACT';
    case SPOT = 'SPOT';
    case OTHER = 'OTHER';
}
