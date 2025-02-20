<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\DTOs\Market\InstrumentInfo\Spot\LotSizeFilter;
use BybitApi\DTOs\Market\InstrumentInfo\Spot\PriceFilter;
use BybitApi\Enums\MarginTrading;
use BybitApi\Enums\SymbolStatus;

/**
 * @property null|string $symbol
 * @property null|string $baseCoin
 * @property null|string $quoteCoin
 * @property null|bool $innovation
 * @property null|SymbolStatus $status
 * @property null|MarginTrading $marginTrading
 * @property null|bool $stTag
 * @property null|\BybitApi\DTOs\Market\InstrumentInfo\Spot\LotSizeFilter $lotSizeFilter
 * @property null|PriceFilter $priceFilter
 * @property null|\BybitApi\DTOs\Market\InstrumentInfo\RiskParameters $riskParameters
 */
class Spot extends DTO
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
