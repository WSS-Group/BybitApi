<?php

namespace BybitApi\Enums;

enum ContractType: string
{
    case INVERSE_PERPETUAL = 'InversePerpetual';
    case LINEAR_PERPETUAL = 'LinearPerpetual';
    case LINEAR_FUTURES = 'LinearFutures';
    case INVERSE_FUTURES = 'InverseFutures';
    case OTHER = 'OTHER';
}
