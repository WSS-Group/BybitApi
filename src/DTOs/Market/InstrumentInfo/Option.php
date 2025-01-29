<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\SymbolStatus;

/**
 * @property null|string $symbol
 * @property null|SymbolStatus $status
 * @property null|string $baseCoin
 * @property null|string $quoteCoin
 * @property null|string $settleCoin
 * @property null|\Illuminate\Support\Carbon $launchTime
 * @property null|\Illuminate\Support\Carbon $deliveryTime
 * @property null|float $deliveryFeeRate
 * @property null|\BybitApi\DTOs\Market\InstrumentInfo\PriceFilter $priceFilter
 * @property null|\BybitApi\DTOs\Market\InstrumentInfo\LotSizeFilter $lotSizeFilter
 */
readonly class Option extends DTO
{

    public function casts(): array
    {
        return [
            'symbol' => StringCast::class,
            'status' => new EnumCast(SymbolStatus::class),
            'baseCoin' => StringCast::class,
            'quoteCoin' => StringCast::class,
            'settleCoin' => StringCast::class,
            'launchTime' => TimestampCast::class,
            'deliveryTime' => TimestampCast::class,
            'deliveryFeeRate' => FloatCast::class,
            'priceFilter' => PriceFilter::class,
            'lotSizeFilter' => LotSizeFilter::class,
        ];
    }
}
