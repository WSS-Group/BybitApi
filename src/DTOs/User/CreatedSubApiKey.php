<?php

namespace BybitApi\DTOs\User;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $id
 * @property null|string $note
 * @property null|string $apiKey
 * @property null|bool $readOnly
 * @property null|bool $secret
 * @property null|\BybitApi\DTOs\User\Permissions $permissions
 */
class CreatedSubApiKey extends DTO
{
    public function casts(): array
    {
        return [
            'id' => StringCast::class,
            'note' => StringCast::class,
            'apiKey' => StringCast::class,
            'readOnly' => BooleanCast::class,
            'secret' => StringCast::class,
            'permissions' => Permissions::class,
        ];
    }
}
