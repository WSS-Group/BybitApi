<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\CurAuctionPhase;

/**
 * @property null|float $auctionFeeRate
 * @property null|float $takerFeeRate
 * @property null|float $makerFeeRate
 */
readonly class AuctionFeeInfo extends DTO
{

    public function casts(): array
    {
        return [
            'auctionFeeRate' => FloatCast::class,
            'takerFeeRate' => FloatCast::class,
            'makerFeeRate' => FloatCast::class,
        ];
    }
}
