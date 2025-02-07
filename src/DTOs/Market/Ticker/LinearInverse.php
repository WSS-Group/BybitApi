<?php

namespace BybitApi\DTOs\Market\Ticker;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\CurAuctionPhase;
use Illuminate\Support\Carbon;

/**
 * @property null|string $symbol
 * @property null|float $lastPrice
 * @property null|float $indexPrice
 * @property null|float $markPrice
 * @property null|float $prevPrice24h
 * @property null|float $price24hPcnt
 * @property null|float $highPrice24h
 * @property null|float $lowPrice24h
 * @property null|float $prevPrice1h
 * @property null|float $openInterest
 * @property null|float $openInterestValue
 * @property null|float $turnover24h
 * @property null|float $volume24h
 * @property null|float $fundingRate
 * @property null|Carbon $nextFundingTime
 * @property null|float $predictedDeliveryPrice
 * @property null|float $basisRate
 * @property null|float $basis
 * @property null|float $deliveryFeeRate
 * @property null|Carbon $deliveryTime
 * @property null|float $ask1Size
 * @property null|float $bid1Price
 * @property null|float $ask1Price
 * @property null|float $bid1Size
 * @property null|float $preOpenPrice
 * @property null|float $preQty
 * @property null|CurAuctionPhase $curPreListingPhase
 */
class LinearInverse extends DTO
{
    public function casts(): array
    {
        return [
            'symbol' => StringCast::class,
            'lastPrice' => FloatCast::class,
            'indexPrice' => FloatCast::class,
            'markPrice' => FloatCast::class,
            'prevPrice24h' => FloatCast::class,
            'price24hPcnt' => FloatCast::class,
            'highPrice24h' => FloatCast::class,
            'lowPrice24h' => FloatCast::class,
            'prevPrice1h' => FloatCast::class,
            'openInterest' => FloatCast::class,
            'openInterestValue' => FloatCast::class,
            'turnover24h' => FloatCast::class,
            'volume24h' => FloatCast::class,
            'fundingRate' => FloatCast::class,
            'nextFundingTime' => TimestampMsCast::class,
            'predictedDeliveryPrice' => FloatCast::class,
            'basisRate' => FloatCast::class,
            'basis' => FloatCast::class,
            'deliveryFeeRate' => FloatCast::class,
            'deliveryTime' => TimestampMsCast::class,
            'ask1Size' => FloatCast::class,
            'bid1Price' => FloatCast::class,
            'ask1Price' => FloatCast::class,
            'bid1Size' => FloatCast::class,
            'preOpenPrice' => FloatCast::class,
            'preQty' => FloatCast::class,
            'curPreListingPhase' => new EnumCast(CurAuctionPhase::class, CurAuctionPhase::OTHER),
        ];
    }
}
