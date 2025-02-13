<?php

namespace BybitApi\Enums;

enum AccountStatus: int
{
    case NORMAL = 1;
    case LOGIN_BANNED = 2;
    case FROZEN = 3;
}
