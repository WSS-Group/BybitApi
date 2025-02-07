<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\DTOCollectionCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\AccountType;

/**
 * @property null|AccountType $accountType
 * @property null|string $memberId
 * @property null|\Illuminate\Support\Collection<int, \BybitApi\DTOs\Asset\Balance> $balance
 */
class AllCoinsBalance extends DTO
{
    public function casts(): array
    {
        return [
            'accountType' => new EnumCast(AccountType::class),
            'memberId' => StringCast::class,
            'balance' => new DTOCollectionCast(Balance::class),
        ];
    }
}
