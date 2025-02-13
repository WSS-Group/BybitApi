<?php

namespace BybitApi\DTOs\User;

use BybitApi\DTOs\Casts\EnumArrayCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\AccountType;

/**
 * @property null|string $uid
 * @property null|\BybitApi\Enums\AccountType[] $accountType
 */
class WalletType extends DTO
{
    public function casts(): array
    {
        return [
            'uid' => StringCast::class,
            'accountType' => new EnumArrayCast(AccountType::class, AccountType::OTHER),
        ];
    }
}
