<?php

namespace BybitApi\Enums;

enum CoinType: string
{
    case FIAT = 'fiat';
    case CRYPTO = 'crypto';
    case OTHER = 'other';
}
