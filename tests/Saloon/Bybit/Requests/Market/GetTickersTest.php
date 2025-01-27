<?php

use BybitApi\DTOs\Ticker;
use BybitApi\Enums\Category;
use BybitApi\Facades\Market;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetTickers;
use BybitApi\Tests\Fixtures\Bybit\Market\GetTickers\OneSymbolFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetTickers\TenSymbolsFixture;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;

it('return then tickers when passing only category parameter', function () {
    MockClient::global([
        GetTickers::class => new TenSymbolsFixture()(),
    ]);

    $collection = Market::actingAs($this->defaultActor())
        ->getTickers(Category::INVERSE);

    expect($collection)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(10)
        ->each
        ->toBeInstanceOf(Ticker::class);
});

it('return a ticker object when passing a symbol parameter', function () {
    MockClient::global([
        GetTickers::class => new OneSymbolFixture()(),
    ]);

    $ticker = Market::actingAs($this->defaultActor())
        ->getTickers(Category::INVERSE, 'BTCUSDT');

    expect($ticker)
        ->toBeInstanceOf(Ticker::class)
        ->and($ticker->deliveryTime)
        ->toBeInstanceOf(Carbon::class)
        ->and($ticker->nextFundingTime)
        ->toBeInstanceOf(Carbon::class);
});
