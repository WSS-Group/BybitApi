<?php

namespace BybitApi\Enums;

enum TimeInForce: string
{
    case GTC = 'GTC';
    case IOC = 'IOC';
    case FOK = 'FOK';
    case POST_ONLY = 'PostOnly';
}