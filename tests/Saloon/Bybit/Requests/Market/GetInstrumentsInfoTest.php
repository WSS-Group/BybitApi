<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Market\InstrumentInfo\LeverageFilter;
use BybitApi\DTOs\Market\InstrumentInfo\LotSizeFilter;
use BybitApi\DTOs\Market\InstrumentInfo\PreListingInfo;
use BybitApi\DTOs\Market\InstrumentInfo\PriceFilter;
use BybitApi\DTOs\Market\InstrumentInfo\RiskParameters;
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
        ->toBeInstanceOf(PriceFilter::class)
        ->and($instrumentInfo->lotSizeFilter)
        ->toBeInstanceOf(LotSizeFilter::class)
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
                ->toBeInstanceOf(PriceFilter::class)
                ->and($instrumentInfo->lotSizeFilter)
                ->toBeInstanceOf(LotSizeFilter::class)
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
        ->toBeInstanceOf(PriceFilter::class)
        ->and($instrumentInfo->lotSizeFilter)
        ->toBeInstanceOf(LotSizeFilter::class)
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
                ->toBeInstanceOf(PriceFilter::class)
                ->and($instrumentInfo->lotSizeFilter)
                ->toBeInstanceOf(LotSizeFilter::class)
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
        ->toBeInstanceOf(LotSizeFilter::class)
        ->and($instrumentInfo->priceFilter)
        ->toBeInstanceOf(PriceFilter::class)
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
                ->toBeInstanceOf(LotSizeFilter::class)
                ->and($instrumentInfo->priceFilter)
                ->toBeInstanceOf(PriceFilter::class)
                ->and($instrumentInfo->riskParameters)
                ->toBeInstanceOf(RiskParameters::class)
                ->and($instrumentInfo->toArray())
                ->toBeArray();
        });
});
