<?php

namespace BybitApi\Enums;

enum ConvertAccountType: string
{
    case UTA = 'eb_convert_uta';
    case FUNDING = 'eb_convert_funding';
    case INVERSE = 'eb_convert_inverse';
    case SPOT = 'eb_convert_spot';
    case CONTRACT = 'eb_convert_contract';
}
