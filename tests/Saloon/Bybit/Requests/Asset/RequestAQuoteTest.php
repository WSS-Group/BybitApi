<?php

use BybitApi\DTOs\Asset\ConvertQuote;
use BybitApi\Enums\CoinType;
use BybitApi\Enums\ConvertAccountType;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\RequestAQuote;
use BybitApi\Tests\Fixtures\Bybit\Asset\RequestAQuote\OkFixture;
use Illuminate\Support\Carbon;
use Saloon\Http\Faking\MockClient;

it('can request a quote for convert a coin', function () {
    MockClient::global([
        RequestAQuote::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->requestAQuote(
        ConvertAccountType::FUNDING,
        'BTC',
        'USDT',
        'BTC',
        '0.01'
    );

    expect($result)
        ->toBeInstanceOf(ConvertQuote::class)
        ->and($result->quoteTxId)
        ->toBeString()
        ->and($result->exchangeRate)
        ->toBeFloat()
        ->and($result->fromCoin)
        ->toBeString()
        ->and($result->fromCoinType)
        ->tobeInstanceOf(CoinType::class)
        ->and($result->toCoin)
        ->toBeString()
        ->and($result->toCoinType)
        ->tobeInstanceOf(CoinType::class)
        ->and($result->fromAmount)
        ->toBeFloat()
        ->and($result->toAmount)
        ->toBeFloat()
        ->and($result->expiredTime)
        ->toBeInstanceOf(Carbon::class)
        ->and($result->requestId)
        ->toBeNull();
});
