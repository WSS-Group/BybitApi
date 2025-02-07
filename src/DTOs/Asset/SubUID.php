<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\StringArrayCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string[] $subMemberIds
 * @property null|string[] $transferableSubMemberIds
 */
class SubUID extends DTO
{
    public function casts(): array
    {
        return [
            'subMemberIds' => StringArrayCast::class,
            'transferableSubMemberIds' => StringArrayCast::class,
        ];
    }
}
