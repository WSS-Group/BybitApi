<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\StringArrayCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\UnifiedUpgradeStatus;

/**
 * @property null|\BybitApi\Enums\UnifiedUpgradeStatus $unifiedUpdateStatus
 * @property null|string[] $unifiedUpdateMsg
 */
class UpgradeResult extends DTO
{
    public function casts(): array
    {
        return [
            'unifiedUpdateStatus' => new EnumCast(UnifiedUpgradeStatus::class),
            'unifiedUpdateMsg' => StringArrayCast::class,
        ];
    }
}
