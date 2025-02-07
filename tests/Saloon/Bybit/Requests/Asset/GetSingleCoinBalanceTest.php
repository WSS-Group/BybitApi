<?php

use BybitApi\DTOs\Asset\Balance;
use BybitApi\DTOs\Asset\SingleCoinBalance;
use BybitApi\Enums\AccountType;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetSingleCoinBalance;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetSingleCoinBalance\OkFixture;
use Saloon\Http\Faking\MockClient;

it('return a single coin', function () {
    MockClient::global([
        GetSingleCoinBalance::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getSingleCoinBalance(AccountType::FUND, 'BTC');

    expect($result)
        ->toBeInstanceOf(SingleCoinBalance::class)
        ->and($result->balance)
        ->toBeInstanceOf(Balance::class)
        ->and($result->balance->coin)
        ->toBe('BTC');
});
