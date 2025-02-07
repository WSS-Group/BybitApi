<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Asset\WithdrawableAmount\AccountTypes;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|float $limitAmountUsd
 * @property null|\BybitApi\DTOs\Asset\WithdrawableAmount\AccountTypes $withdrawableAmount
 */
class WithdrawableAmount extends DTO
{
    public function casts(): array
    {
        return [
            'limitAmountUsd' => FloatCast::class,
            'withdrawableAmount' => AccountTypes::class,
        ];
    }
}
