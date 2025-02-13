<?php

namespace BybitApi\DTOs\User;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\AccountMode;
use BybitApi\Enums\AccountStatus;
use BybitApi\Enums\MemberType;

/**
 * @property null|string $uid
 * @property null|string $username
 * @property null|MemberType $memberType
 * @property null|AccountStatus $status
 * @property null|AccountMode $accountMode
 * @property null|string $remark
 */
class UID extends DTO
{
    public function casts(): array
    {
        return [
            'uid' => StringCast::class,
            'username' => StringCast::class,
            'memberType' => new EnumCast(MemberType::class),
            'status' => new EnumCast(AccountStatus::class),
            'accountMode' => new EnumCast(AccountMode::class),
            'remark' => StringCast::class,
        ];
    }
}
