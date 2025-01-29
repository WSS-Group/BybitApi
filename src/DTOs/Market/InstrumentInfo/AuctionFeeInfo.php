<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\DTO;

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
