<?php

use BybitApi\DTOs\Market\Ticker\LinearInverse;
use BybitApi\DTOs\Market\Ticker\Option;
use BybitApi\DTOs\Market\Ticker\Spot;
use BybitApi\Enums\Category;
use BybitApi\Facades\Market;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetTickers;
use BybitApi\Tests\Fixtures\Bybit\Market\GetTickers\LinearListFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetTickers\LinearSingleFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetTickers\OptionListFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetTickers\OptionSingleFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetTickers\SpotListFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetTickers\SpotSingleFixture;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;

it('works with single linear', function () {
    MockClient::global([
        GetTickers::class => LinearSingleFixture::call(),
    ]);

    $ticker = Market::actingAs($this->defaultActor())
        ->getTickers(Category::LINEAR, 'BTCUSDT');

    expect($ticker)
        ->toBeInstanceOf(LinearInverse::class)
        ->and($ticker->deliveryTime)
        ->toBeInstanceOf(Carbon::class)
        ->and($ticker->nextFundingTime)
        ->toBeInstanceOf(Carbon::class);
});

it('works with list linear', function () {
    MockClient::global([
        GetTickers::class => LinearListFixture::call(),
    ]);

    $collection = Market::actingAs($this->defaultActor())
        ->getTickers(Category::INVERSE);

    expect($collection)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(10)
        ->each
        ->toBeInstanceOf(LinearInverse::class);

});

it('works with single option', function () {
    MockClient::global([
        GetTickers::class => OptionSingleFixture::call(),
    ]);

    $ticker = Market::actingAs($this->defaultActor())
        ->getTickers(Category::OPTION, 'BTC-28MAR25-80000-C');

    expect($ticker)
        ->toBeInstanceOf(Option::class)
        ->and($ticker->toArray())
        ->toBeArray();
});

it('works with list option', function () {
    MockClient::global([
        GetTickers::class => OptionListFixture::call(),
    ]);

    $collection = Market::actingAs($this->defaultActor())
        ->getTickers(Category::OPTION, baseCoin: 'BTC');

    expect($collection)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2)
        ->each
        ->toBeInstanceOf(Option::class);
});

it('works with single spot', function () {
    MockClient::global([
        GetTickers::class => SpotSingleFixture::call(),
    ]);

    $ticker = Market::actingAs($this->defaultActor())
        ->getTickers(Category::SPOT, 'BTCUSDT');

    expect($ticker)
        ->toBeInstanceOf(Spot::class)
        ->and($ticker->toArray())
        ->toBeArray();
});

it('works with list spot', function () {
    MockClient::global([
        GetTickers::class => SpotListFixture::call(),
    ]);

    $collection = Market::actingAs($this->defaultActor())
        ->getTickers(Category::SPOT);

    expect($collection)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2)
        ->each
        ->toBeInstanceOf(Spot::class);
});
