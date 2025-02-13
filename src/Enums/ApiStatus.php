<?php

namespace BybitApi\Enums;

enum ApiStatus: int
{
    case PERMANENT = 1;
    case EXPIRED = 2;
    case WITHIN_THE_VALIDITY_PERIOD = 3;
    case EXPIRES_SOON = 4;
}
