<?php

namespace BybitApi\DTOs\Asset\WithdrawableAmount;

use BybitApi\DTOs\DTO;

/**
 * @property null|\BybitApi\DTOs\Asset\WithdrawableAmount\Account $SPOT
 * @property null|\BybitApi\DTOs\Asset\WithdrawableAmount\Account $FUND
 */
class AccountTypes extends DTO
{
    public function casts(): array
    {
        return [
            'SPOT' => Account::class,
            'FUND' => Account::class,
        ];
    }
}
