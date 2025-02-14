<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\CollateralSwitch;

/**
 * @property null|string $coin
 * @property null|\BybitApi\Enums\CollateralSwitch $collateralSwitch
 */
class ChangedCollateral extends DTO
{
    public function casts(): array
    {
        return [
            'coin' => StringCast::class,
            'collateralSwitch' => new EnumCast(CollateralSwitch::class),
        ];
    }
}
