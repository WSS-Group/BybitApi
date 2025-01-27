<?php

namespace BybitApi\DTOs;

use BybitApi\Enums\CurAuctionPhase;
use Illuminate\Support\Carbon;

/**
 * @property \Illuminate\Support\Carbon $nextFundingTime
 * @property \Illuminate\Support\Carbon $deliveryTime
 */
readonly class Ticker
{
    public function __construct(
        public ?string $symbol,
        public ?float $lastPrice,
        public ?float $indexPrice,
        public ?float $markPrice,
        public ?float $prevPrice24h,
        public ?float $price24hPcnt,
        public ?float $highPrice24h,
        public ?float $lowPrice24h,
        public ?float $prevPrice1h,
        public ?float $openInterest,
        public ?float $openInterestValue,
        public ?float $turnover24h,
        public ?float $volume24h,
        public ?float $fundingRate,
        public ?int $nextFundingTimestamp,
        public ?float $predictedDeliveryPrice,
        public ?float $basisRate,
        public ?float $basis,
        public ?float $deliveryFeeRate,
        public ?int $deliveryTimestamp,
        public ?float $ask1Size,
        public ?float $bid1Price,
        public ?float $ask1Price,
        public ?float $bid1Size,
        public ?float $preOpenPrice,
        public ?float $preQty,
        public ?CurAuctionPhase $curPreListingPhase,
    ) {
        //
    }

    public function __get(string $name)
    {
        if ($name === 'nextFundingTime') {
            return Carbon::createFromTimestampMs($this->nextFundingTimestamp)
                ->setTimezone(config('app.timezone'));
        }
        if ($name === 'deliveryTime') {
            return Carbon::createFromTimestampMs($this->deliveryTimestamp)
                ->setTimezone(config('app.timezone'));
        }
    }
}
