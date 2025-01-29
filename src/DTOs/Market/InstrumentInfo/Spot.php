<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\MarginTrading;
use BybitApi\Enums\SymbolStatus;

/**
 * @property null|float $turnover
 */
readonly class Spot extends DTO
{
    public function casts(): array
    {
        return [
            'symbol' => StringCast::class,
            'baseCoin' => StringCast::class,
            'quoteCoin' => StringCast::class,
            'innovation' => BooleanCast::class,
            'status' => new EnumCast(SymbolStatus::class),
            'marginTrading' => new EnumCast(MarginTrading::class, MarginTrading::OTHER),
            'stTag' => BooleanCast::class,
            'lotSizeFilter' => LotSizeFilter::class,
            'priceFilter' => PriceFilter::class,
            'riskParameters' => RiskParameters::class,
        ];
    }
}
