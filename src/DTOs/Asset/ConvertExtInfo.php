<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $paramType
 * @property null|string $paramValue
 */
class ConvertExtInfo extends DTO
{
    public function casts(): array
    {
        return [
            'paramType' => StringCast::class,
            'paramValue' => StringCast::class,
        ];
    }
}
