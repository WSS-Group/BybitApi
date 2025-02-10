<?php

use BybitApi\DTOs\Asset\ConvertStatus;
use BybitApi\Enums\CoinType;
use BybitApi\Enums\ConvertAccountType;
use BybitApi\Enums\ExchangeStatus;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetConvertStatus;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetConvertStatus\OkFixture;
use Illuminate\Support\Carbon;
use Saloon\Http\Faking\MockClient;

it('can get a status from a convert', function () {
    MockClient::global([
        GetConvertStatus::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getConvertStatus(
        'foo_bar',
        ConvertAccountType::FUNDING,
    );

    expect($result)
        ->toBeInstanceOf(ConvertStatus::class)
        ->and($result->accountType)
        ->toBeInstanceOf(ConvertAccountType::class)
        ->and($result->exchangeTxId)
        ->toBeString()
        ->toEqual('foo_bar')
        ->and($result->userId)
        ->toBeString()
        ->and($result->fromCoin)
        ->toBeString()
        ->and($result->fromCoinType)
        ->toBeInstanceOf(CoinType::class)
        ->and($result->toCoin)
        ->toBeString()
        ->and($result->toCoinType)
        ->toBeInstanceOf(CoinType::class)
        ->and($result->fromAmount)
        ->toBeFloat()
        ->and($result->toAmount)
        ->toBeFloat()
        ->and($result->exchangeStatus)
        ->toBeInstanceOf(ExchangeStatus::class)
        ->and($result->convertRate)
        ->toBeFloat()
        ->and($result->createdAt)
        ->toBeInstanceOf(Carbon::class);
});
