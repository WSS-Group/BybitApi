<?php

namespace BybitApi\Tests\DTO;

use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property string $label
 * @property string $value
 */
class Parameter extends DTO
{
    public function casts(): array
    {
        return [
            'label' => StringCast::class,
            'value' => StringCast::class,
        ];
    }
}
