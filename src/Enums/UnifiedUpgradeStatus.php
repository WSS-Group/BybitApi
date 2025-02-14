<?php

namespace BybitApi\Enums;

enum UnifiedUpgradeStatus: string
{
    case FAIL = 'FAIL';
    case PROCESS = 'PROCESS';
    case SUCCESS = 'SUCCESS';
}
