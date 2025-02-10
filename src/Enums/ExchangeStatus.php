<?php

namespace BybitApi\Enums;

enum ExchangeStatus: string
{
    case INIT = 'init';
    case PROCESSING = 'processing';
    case SUCCESS = 'success';
    case FAILURE = 'failure';
    case OTHER = 'OTHER';
}
