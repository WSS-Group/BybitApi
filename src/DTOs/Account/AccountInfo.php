<?php

namespace BybitApi\DTOs\Account;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\MarginMode;
use BybitApi\Enums\SpotHedgingStatus;
use BybitApi\Enums\UnifiedMarginStatus;

/**
 * @property null|\BybitApi\Enums\UnifiedMarginStatus $unifiedMarginStatus
 * @property null|MarginMode $marginMode
 * @property null|bool $isMasterTrader
 * @property null|SpotHedgingStatus $spotHedgingStatus
 * @property null|\Illuminate\Support\Carbon $updatedTime
 * @property null|string $dcpStatus
 * @property null|int $timeWindow
 * @property null|int $smpGroup
 */
class AccountInfo extends DTO
{
    public function casts(): array
    {
        return [
            'unifiedMarginStatus' => new EnumCast(UnifiedMarginStatus::class),
            'marginMode' => new EnumCast(MarginMode::class),
            'isMasterTrader' => BooleanCast::class,
            'spotHedgingStatus' => new EnumCast(SpotHedgingStatus::class),
            'updatedTime' => TimestampMsCast::class,
            'dcpStatus' => StringCast::class,
            'timeWindow' => IntCast::class,
            'smpGroup' => IntCast::class,
        ];
    }
}
