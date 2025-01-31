<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\DTOArrayCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\CurAuctionPhase;

/**
 * @property null|CurAuctionPhase $curAuctionPhase
 * @property null|\BybitApi\DTOs\Market\InstrumentInfo\Phase[] $phases
 * @property null|\BybitApi\DTOs\Market\InstrumentInfo\AuctionFeeInfo $auctionFeeInfo
 */
class PreListingInfo extends DTO
{
    public function casts(): array
    {
        return [
            'curAuctionPhase' => new EnumCast(CurAuctionPhase::class, CurAuctionPhase::OTHER),
            'phases' => new DTOArrayCast(Phase::class),
            'auctionFeeInfo' => AuctionFeeInfo::class,
        ];
    }
}
