<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\CurAuctionPhase;

/**
 * @property null|CurAuctionPhase $phase
 * @property null|\Illuminate\Support\Carbon $startTime
 * @property null|\Illuminate\Support\Carbon $endTime
 */
class Phase extends DTO
{
    public function casts(): array
    {
        return [
            'phase' => new EnumCast(CurAuctionPhase::class, CurAuctionPhase::OTHER),
            'startTime' => TimestampMsCast::class,
            'endTime' => TimestampMsCast::class,
        ];
    }
}
