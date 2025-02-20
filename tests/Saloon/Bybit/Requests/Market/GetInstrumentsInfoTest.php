<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Market\InstrumentInfo\LinearInverse\LeverageFilter;
use BybitApi\DTOs\Market\InstrumentInfo\LinearInverse\LotSizeFilter as LinearInverseLotSizeFilter;
use BybitApi\DTOs\Market\InstrumentInfo\LinearInverse\PriceFilter as LinearInversePriceFilter;
use BybitApi\DTOs\Market\InstrumentInfo\Option\LotSizeFilter as OptionLotSizeFilter;
use BybitApi\DTOs\Market\InstrumentInfo\Option\PriceFilter as OptionPriceFilter;
use BybitApi\DTOs\Market\InstrumentInfo\PreListingInfo;
use BybitApi\DTOs\Market\InstrumentInfo\RiskParameters;
use BybitApi\DTOs\Market\InstrumentInfo\Spot\LotSizeFilter as SpotLotSizeFilter;
use BybitApi\DTOs\Market\InstrumentInfo\Spot\PriceFilter as SpotPriceFilter;
use BybitApi\Enums\Category;
use BybitApi\Enums\ContractType;
use BybitApi\Enums\CopyTrading;
use BybitApi\Enums\MarginTrading;
use BybitApi\Enums\SymbolStatus;
use BybitApi\Facades\Market;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetInstrumentsInfo;
use BybitApi\Tests\Fixtures\Bybit\Market\GetInstrumentsInfo\LinearListFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetInstrumentsInfo\LinearSingleFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetInstrumentsInfo\OptionListFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetInstrumentsInfo\OptionSingleFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetInstrumentsInfo\SpotListFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetInstrumentsInfo\SpotSingleFixture;
use Illuminate\Support\Carbon;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('works with single linear', function () {
    MockClient::global([
        GetInstrumentsInfo::class => LinearSingleFixture::call(),
    ]);

    $instrumentInfo = Market::actingAs($this->defaultActor())
        ->getInstrumentsInfo(Category::LINEAR, 'BTCUSDT');

    expect($instrumentInfo)
        ->toBeInstanceOf(BybitApi\DTOs\Market\InstrumentInfo\LinearInverse::class)
        ->and($instrumentInfo->symbol)
        ->toBeString()
        ->and($instrumentInfo->contractType)
        ->toBeInstanceOf(ContractType::class)
        ->and($instrumentInfo->status)
        ->toBeInstanceOf(SymbolStatus::class)
        ->and($instrumentInfo->baseCoin)
        ->toBeString()
        ->and($instrumentInfo->quoteCoin)
        ->toBeString()
        ->and($instrumentInfo->launchTime)
        ->toBeInstanceOf(Carbon::class)
        ->and($instrumentInfo->deliveryTime)
        ->toBeInstanceOf(Carbon::class)
        ->and($instrumentInfo->deliveryFeeRate)
        ->toBeNull()
        ->and($instrumentInfo->priceScale)
        ->toBeInt()
        ->and($instrumentInfo->leverageFilter)
        ->toBeInstanceOf(LeverageFilter::class)
        ->and($instrumentInfo->priceFilter)
        ->toBeInstanceOf(LinearInversePriceFilter::class)
        ->and($instrumentInfo->lotSizeFilter)
        ->toBeInstanceOf(LinearInverseLotSizeFilter::class)
        ->and($instrumentInfo->unifiedMarginTrade)
        ->toBeBool()
        ->and($instrumentInfo->fundingInterval)
        ->toBeInt()
        ->and($instrumentInfo->settleCoin)
        ->toBeString()
        ->and($instrumentInfo->copyTrading)
        ->toBeInstanceOf(CopyTrading::class)
        ->and($instrumentInfo->upperFundingRate)
        ->toBeFloat()
        ->and($instrumentInfo->lowerFundingRate)
        ->toBeFloat()
        ->and($instrumentInfo->riskParameters)
        ->toBeInstanceOf(RiskParameters::class)
        ->and($instrumentInfo->isPreListing)
        ->toBeBool()
        ->and($instrumentInfo->preListingInfo)
        ->toBeInstanceOf(PreListingInfo::class)
        ->and($instrumentInfo->toArray())
        ->toBeArray();
});

it('works with list linear', function () {
    MockClient::global([
        GetInstrumentsInfo::class => LinearListFixture::call(),
    ]);

    $collection = Market::actingAs($this->defaultActor())
        ->getInstrumentsInfo(Category::LINEAR);

    expect($collection->getCursor())
        ->toBeString()
        ->and($collection)
        ->toBeInstanceOf(CursorCollection::class)
        ->toHaveCount(2)
        ->each(function (Expectation $e) {
            $instrumentInfo = $e->value;
            $e->toBeInstanceOf(BybitApi\DTOs\Market\InstrumentInfo\LinearInverse::class)
                ->and($instrumentInfo->symbol)
                ->toBeString()
                ->and($instrumentInfo->contractType)
                ->toBeInstanceOf(ContractType::class)
                ->and($instrumentInfo->status)
                ->toBeInstanceOf(SymbolStatus::class)
                ->and($instrumentInfo->baseCoin)
                ->toBeString()
                ->and($instrumentInfo->quoteCoin)
                ->toBeString()
                ->and($instrumentInfo->launchTime)
                ->toBeInstanceOf(Carbon::class)
                ->and($instrumentInfo->deliveryTime)
                ->toBeInstanceOf(Carbon::class)
                ->and($instrumentInfo->deliveryFeeRate)
                ->toBeNull()
                ->and($instrumentInfo->priceScale)
                ->toBeInt()
                ->and($instrumentInfo->leverageFilter)
                ->toBeInstanceOf(LeverageFilter::class)
                ->and($instrumentInfo->priceFilter)
                ->toBeInstanceOf(LinearInversePriceFilter::class)
                ->and($instrumentInfo->lotSizeFilter)
                ->toBeInstanceOf(LinearInverseLotSizeFilter::class)
                ->and($instrumentInfo->unifiedMarginTrade)
                ->toBeBool()
                ->and($instrumentInfo->fundingInterval)
                ->toBeInt()
                ->and($instrumentInfo->settleCoin)
                ->toBeString()
                ->and($instrumentInfo->copyTrading)
                ->toBeInstanceOf(CopyTrading::class)
                ->and($instrumentInfo->upperFundingRate)
                ->toBeFloat()
                ->and($instrumentInfo->lowerFundingRate)
                ->toBeFloat()
                ->and($instrumentInfo->riskParameters)
                ->toBeInstanceOf(RiskParameters::class)
                ->and($instrumentInfo->isPreListing)
                ->toBeBool()
                ->and($instrumentInfo->preListingInfo)
                ->toBeInstanceOf(PreListingInfo::class);
        });
});

it('works with single option', function () {
    MockClient::global([
        GetInstrumentsInfo::class => OptionSingleFixture::call(),
    ]);

    $instrumentInfo = Market::actingAs($this->defaultActor())
        ->getInstrumentsInfo(Category::OPTION, 'BTC-26DEC25-260000-P');

    expect($instrumentInfo)
        ->toBeInstanceOf(BybitApi\DTOs\Market\InstrumentInfo\Option::class)
        ->and($instrumentInfo->symbol)
        ->toBeString()
        ->and($instrumentInfo->symbol)
        ->toBeString()
        ->and($instrumentInfo->status)
        ->toBeInstanceOf(SymbolStatus::class)
        ->and($instrumentInfo->baseCoin)
        ->toBeString()
        ->and($instrumentInfo->quoteCoin)
        ->toBeString()
        ->and($instrumentInfo->settleCoin)
        ->toBeString()
        ->and($instrumentInfo->launchTime)
        ->toBeInstanceOf(Carbon::class)
        ->and($instrumentInfo->deliveryTime)
        ->toBeInstanceOf(Carbon::class)
        ->and($instrumentInfo->deliveryFeeRate)
        ->toBeFloat()
        ->and($instrumentInfo->priceFilter)
        ->toBeInstanceOf(OptionPriceFilter::class)
        ->and($instrumentInfo->lotSizeFilter)
        ->toBeInstanceOf(OptionLotSizeFilter::class)
        ->and($instrumentInfo->toArray())
        ->toBeArray();
});

it('works with list option', function () {
    MockClient::global([
        GetInstrumentsInfo::class => OptionListFixture::call(),
    ]);

    $collection = Market::actingAs($this->defaultActor())
        ->getInstrumentsInfo(Category::OPTION);

    expect($collection)
        ->toBeInstanceOf(CursorCollection::class)
        ->toHaveCount(2)
        ->each(function (Expectation $e) {
            $instrumentInfo = $e->value;
            $e->and($instrumentInfo->symbol)
                ->toBeString()
                ->and($instrumentInfo->symbol)
                ->toBeString()
                ->and($instrumentInfo->status)
                ->toBeInstanceOf(SymbolStatus::class)
                ->and($instrumentInfo->baseCoin)
                ->toBeString()
                ->and($instrumentInfo->quoteCoin)
                ->toBeString()
                ->and($instrumentInfo->settleCoin)
                ->toBeString()
                ->and($instrumentInfo->launchTime)
                ->toBeInstanceOf(Carbon::class)
                ->and($instrumentInfo->deliveryTime)
                ->toBeInstanceOf(Carbon::class)
                ->and($instrumentInfo->deliveryFeeRate)
                ->toBeFloat()
                ->and($instrumentInfo->priceFilter)
                ->toBeInstanceOf(OptionPriceFilter::class)
                ->and($instrumentInfo->lotSizeFilter)
                ->toBeInstanceOf(OptionLotSizeFilter::class)
                ->and($instrumentInfo->toArray())
                ->toBeArray();
        });
});

it('works with single spot', function () {
    MockClient::global([
        GetInstrumentsInfo::class => SpotSingleFixture::call(),
    ]);

    $instrumentInfo = Market::actingAs($this->defaultActor())
        ->getInstrumentsInfo(Category::SPOT, 'BTCUSDT');

    expect($instrumentInfo)
        ->toBeInstanceOf(BybitApi\DTOs\Market\InstrumentInfo\Spot::class)
        ->and($instrumentInfo->symbol)
        ->toBeString()
        ->and($instrumentInfo->baseCoin)
        ->toBeString()
        ->and($instrumentInfo->quoteCoin)
        ->toBeString()
        ->and($instrumentInfo->innovation)
        ->toBeBool()
        ->and($instrumentInfo->status)
        ->toBeInstanceOf(SymbolStatus::class)
        ->and($instrumentInfo->marginTrading)
        ->toBeInstanceOf(MarginTrading::class)
        ->and($instrumentInfo->stTag)
        ->toBeBool()
        ->and($instrumentInfo->lotSizeFilter)
        ->toBeInstanceOf(SpotLotSizeFilter::class)
        ->and($instrumentInfo->priceFilter)
        ->toBeInstanceOf(SpotPriceFilter::class)
        ->and($instrumentInfo->riskParameters)
        ->toBeInstanceOf(RiskParameters::class)
        ->and($instrumentInfo->toArray())
        ->toBeArray();
});

it('works with list spot', function () {
    MockClient::global([
        GetInstrumentsInfo::class => SpotListFixture::call(),
    ]);

    $collection = Market::actingAs($this->defaultActor())
        ->getInstrumentsInfo(Category::SPOT);

    expect($collection)
        ->toBeInstanceOf(CursorCollection::class)
        ->toHaveCount(2)
        ->each(function (Expectation $e) {
            $instrumentInfo = $e->value;
            $e->and($instrumentInfo->symbol)
                ->toBeString()
                ->and($instrumentInfo->baseCoin)
                ->toBeString()
                ->and($instrumentInfo->quoteCoin)
                ->toBeString()
                ->and($instrumentInfo->innovation)
                ->toBeBool()
                ->and($instrumentInfo->status)
                ->toBeInstanceOf(SymbolStatus::class)
                ->and($instrumentInfo->marginTrading)
                ->toBeInstanceOf(MarginTrading::class)
                ->and($instrumentInfo->stTag)
                ->toBeBool()
                ->and($instrumentInfo->lotSizeFilter)
                ->toBeInstanceOf(SpotLotSizeFilter::class)
                ->and($instrumentInfo->priceFilter)
                ->toBeInstanceOf(SpotPriceFilter::class)
                ->and($instrumentInfo->riskParameters)
                ->toBeInstanceOf(RiskParameters::class)
                ->and($instrumentInfo->toArray())
                ->toBeArray();
        });
});

it('can format price, lot and leverage from linear/inverse', function () {
    MockClient::global([
        GetInstrumentsInfo::class => LinearSingleFixture::call(),
    ]);

    $instrumentInfo = Market::actingAs($this->defaultActor())
        ->getInstrumentsInfo(Category::LINEAR, 'BTCUSDT');

    $priceFilter = $instrumentInfo->priceFilter;
    expect($priceFilter->format(0.15, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('0.2')
        ->and($priceFilter->format(0.15, RoundingMode::HalfTowardsZero)->value)
        ->toBe('0.1')
        ->and($priceFilter->format(0.19, RoundingMode::TowardsZero)->value)
        ->toBe('0.1')
        ->and($priceFilter->format(0.11, RoundingMode::AwayFromZero)->value)
        ->toBe('0.2')
        ->and($priceFilter->format(0.01, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('0.1')
        ->and($priceFilter->format(3000000, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('1999999.8');

    $lotSizeFilter = $instrumentInfo->lotSizeFilter;
    expect($lotSizeFilter->format(0.0015, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('0.002')
        ->and($lotSizeFilter->format(0.0015, RoundingMode::HalfTowardsZero)->value)
        ->toBe('0.001')
        ->and($lotSizeFilter->format(0.0015, RoundingMode::TowardsZero)->value)
        ->toBe('0.001')
        ->and($lotSizeFilter->format(0.0015, RoundingMode::AwayFromZero)->value)
        ->toBe('0.002')
        ->and($lotSizeFilter->format(0.0005, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('0.001')
        ->and($lotSizeFilter->format(2000, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('1190');

    $leverageFilter = $instrumentInfo->leverageFilter;
    expect($leverageFilter->format(1.015, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('1.02')
        ->and($leverageFilter->format(1.015, RoundingMode::HalfTowardsZero)->value)
        ->toBe('1.01')
        ->and($leverageFilter->format(1.015, RoundingMode::TowardsZero)->value)
        ->toBe('1.01')
        ->and($leverageFilter->format(1.015, RoundingMode::AwayFromZero)->value)
        ->toBe('1.02')
        ->and($leverageFilter->format(0.1, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('1')
        ->and($leverageFilter->format(110, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('100');
});

it('can format price, lot and leverage from option', function () {
    MockClient::global([
        GetInstrumentsInfo::class => OptionSingleFixture::call(),
    ]);

    $instrumentInfo = Market::actingAs($this->defaultActor())
        ->getInstrumentsInfo(Category::OPTION, 'BTC-26DEC25-260000-P');

    $priceFilter = $instrumentInfo->priceFilter;
    expect($priceFilter->format(7.50, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('10')
        ->and($priceFilter->format(7.50, RoundingMode::HalfTowardsZero)->value)
        ->toBe('5')
        ->and($priceFilter->format(9, RoundingMode::TowardsZero)->value)
        ->toBe('5')
        ->and($priceFilter->format(6, RoundingMode::AwayFromZero)->value)
        ->toBe('10')
        ->and($priceFilter->format(3, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('5')
        ->and($priceFilter->format(20000000, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('10000000');

    $lotSizeFilter = $instrumentInfo->lotSizeFilter;
    expect($lotSizeFilter->format(0.015, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('0.02')
        ->and($lotSizeFilter->format(0.015, RoundingMode::HalfTowardsZero)->value)
        ->toBe('0.01')
        ->and($lotSizeFilter->format(0.015, RoundingMode::TowardsZero)->value)
        ->toBe('0.01')
        ->and($lotSizeFilter->format(0.015, RoundingMode::AwayFromZero)->value)
        ->toBe('0.02')
        ->and($lotSizeFilter->format(0.005, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('0.01')
        ->and($lotSizeFilter->format(20000, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('10000');
});

it('can format price, lot and leverage from spot', function () {
    MockClient::global([
        GetInstrumentsInfo::class => SpotSingleFixture::call(),
    ]);

    $instrumentInfo = Market::actingAs($this->defaultActor())
        ->getInstrumentsInfo(Category::SPOT, 'BTCUSDT');

    $priceFilter = $instrumentInfo->priceFilter;
    expect($priceFilter->format(0.015, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('0.02')
        ->and($priceFilter->format(0.015, RoundingMode::HalfTowardsZero)->value)
        ->toBe('0.01')
        ->and($priceFilter->format(0.019, RoundingMode::TowardsZero)->value)
        ->toBe('0.01')
        ->and($priceFilter->format(0.011, RoundingMode::AwayFromZero)->value)
        ->toBe('0.02');

    $lotSizeFilter = $instrumentInfo->lotSizeFilter;
    expect($lotSizeFilter->format(1.0000015, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('1.000002')
        ->and($lotSizeFilter->format(1.0000015, RoundingMode::HalfTowardsZero)->value)
        ->toBe('1.000001')
        ->and($lotSizeFilter->format(1.0000019, RoundingMode::TowardsZero)->value)
        ->toBe('1.000001')
        ->and($lotSizeFilter->format(1.0000011, RoundingMode::AwayFromZero)->value)
        ->toBe('1.000002')
        ->and($lotSizeFilter->format(0.0000015, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('0.000048')
        ->and($lotSizeFilter->format(20000, RoundingMode::HalfAwayFromZero)->value)
        ->toBe('100');
});
