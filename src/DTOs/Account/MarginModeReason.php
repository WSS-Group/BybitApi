<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|int $reasonCode
 * @property null|string $reasonMsg
 */
class MarginModeReason extends DTO
{
    public function casts(): array
    {
        return [
            'reasonCode' => IntCast::class,
            'reasonMsg' => StringCast::class,
        ];
    }
}
