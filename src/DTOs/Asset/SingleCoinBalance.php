<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\AccountType;

/**
 * @property null|AccountType $accountType
 * @property null|int $bizType
 * @property null|string $accountId
 * @property null|string $memberId
 * @property null|\BybitApi\DTOs\Asset\Balance $balance
 */
class SingleCoinBalance extends DTO
{
    public function casts(): array
    {
        return [
            'accountType' => new EnumCast(AccountType::class),
            'bizType' => IntCast::class,
            'accountId' => StringCast::class,
            'memberId' => StringCast::class,
            'balance' => Balance::class,
        ];
    }
}
