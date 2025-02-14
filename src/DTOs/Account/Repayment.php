<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $coin
 * @property null|float $repaymentQty
 */
class Repayment extends DTO
{
    public function casts(): array
    {
        return [
            'coin' => StringCast::class,
            'repaymentQty' => FloatCast::class,
        ];
    }
}
