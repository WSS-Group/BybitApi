<?php

namespace BybitApi\DTOs\User;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\ParseDatetimeCast;
use BybitApi\DTOs\Casts\StringArrayCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\ApiStatus;
use BybitApi\Enums\ApiType;

/**
 * @property null|string $id
 * @property null|array $ips
 * @property null|string $apiKey
 * @property null|string $note
 * @property null|ApiStatus $status
 * @property null|\Illuminate\Support\Carbon $expiredAt
 * @property null|\Illuminate\Support\Carbon $createdAt
 * @property null|ApiType $type
 * @property null|\BybitApi\DTOs\User\Permissions $permissions
 * @property null|bool $secret
 * @property null|bool $readOnly
 * @property null|int $deadlineDay
 * @property null|string $flag
 */
class SubApiKey extends DTO
{
    public function casts(): array
    {
        return [
            'id' => StringCast::class,
            'ips' => StringArrayCast::class,
            'apiKey' => StringCast::class,
            'note' => StringCast::class,
            'status' => new EnumCast(ApiStatus::class),
            'expiredAt' => ParseDatetimeCast::class,
            'createdAt' => ParseDatetimeCast::class,
            'type' => new EnumCast(ApiType::class),
            'permissions' => Permissions::class,
            'secret' => StringCast::class,
            'readOnly' => BooleanCast::class,
            'deadlineDay' => IntCast::class,
            'flag' => StringCast::class,
        ];
    }
}
