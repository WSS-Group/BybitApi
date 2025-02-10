<?php

namespace BybitApi\Enums;

enum WithdrawType: int
{
    case ON_CHAIN = 0;
    case OFF_CHAIN = 1;
    case ALL = 2;
}
