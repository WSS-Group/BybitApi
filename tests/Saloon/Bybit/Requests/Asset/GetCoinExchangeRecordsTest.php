<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\CoinExchange;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetCoinExchangeRecords;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetCoinExchangeRecords\OkFixture;
use Illuminate\Support\Carbon;
use Saloon\Http\Faking\MockClient;

it('return a list of records', function () {
    MockClient::global([
        GetCoinExchangeRecords::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getCoinExchangeRecords();

    dd($result->first()->createdTime);

    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->and($result->first())
        ->toBeInstanceOf(CoinExchange::class)
        ->and($result->first()->fromCoin)
        ->toBeString()
        ->and($result->first()->fromAmount)
        ->toBeFloat()
        ->and($result->first()->toCoin)
        ->toBeString()
        ->and($result->first()->toAmount)
        ->toBeFloat()
        ->and($result->first()->exchangeRate)
        ->toBeFloat()
        ->and($result->first()->createdTime)
        ->toBeInstanceOf(Carbon::class)
        ->and($result->first()->exchangeTxId)
        ->toBeString();
});
