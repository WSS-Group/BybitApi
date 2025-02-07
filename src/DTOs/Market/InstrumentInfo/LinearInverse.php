<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\ContractType;
use BybitApi\Enums\CopyTrading;
use BybitApi\Enums\SymbolStatus;

/**
 * @property null|string $symbol
 * @property null|CopyTrading $contractType
 * @property null|SymbolStatus $status
 * @property null|string $baseCoin
 * @property null|string $quoteCoin
 * @property null|\Illuminate\Support\Carbon $launchTime
 * @property null|\Illuminate\Support\Carbon $deliveryTime
 * @property null|float $deliveryFeeRate
 * @property null|int $priceScale
 * @property null|\BybitApi\DTOs\Market\InstrumentInfo\LeverageFilter $leverageFilter
 * @property null|\BybitApi\DTOs\Market\InstrumentInfo\PriceFilter $priceFilter
 * @property null|\BybitApi\DTOs\Market\InstrumentInfo\LotSizeFilter $lotSizeFilter
 * @property null|bool $unifiedMarginTrade
 * @property null|int $fundingInterval
 * @property null|string $settleCoin
 * @property null|CopyTrading $copyTrading
 * @property null|float $upperFundingRate
 * @property null|float $lowerFundingRate
 * @property null|\BybitApi\DTOs\Market\InstrumentInfo\RiskParameters $riskParameters
 * @property null|bool $isPreListing
 * @property null|\BybitApi\DTOs\Market\InstrumentInfo\PreListingInfo $preListingInfo
 */
class LinearInverse extends DTO
{
    public function casts(): array
    {
        return [
            'symbol' => StringCast::class,
            'contractType' => new EnumCast(ContractType::class, ContractType::OTHER),
            'status' => new EnumCast(SymbolStatus::class),
            'baseCoin' => StringCast::class,
            'quoteCoin' => StringCast::class,
            'launchTime' => TimestampMsCast::class,
            'deliveryTime' => TimestampMsCast::class,
            'deliveryFeeRate' => FloatCast::class,
            'priceScale' => IntCast::class,
            'leverageFilter' => LeverageFilter::class,
            'priceFilter' => PriceFilter::class,
            'lotSizeFilter' => LotSizeFilter::class,
            'unifiedMarginTrade' => BooleanCast::class,
            'fundingInterval' => IntCast::class,
            'settleCoin' => StringCast::class,
            'copyTrading' => new EnumCast(CopyTrading::class, CopyTrading::OTHER),
            'upperFundingRate' => FloatCast::class,
            'lowerFundingRate' => FloatCast::class,
            'riskParameters' => RiskParameters::class,
            'isPreListing' => BooleanCast::class,
            'preListingInfo' => PreListingInfo::class,
        ];
    }
}
