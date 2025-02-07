<?php

use BybitApi\DTOs\Asset\AllCoinsBalance;
use BybitApi\Enums\AccountType;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetAllCoinsBalance;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetAllCoinsBalance\OkFixture;
use Saloon\Http\Faking\MockClient;

it('return a list of coins', function () {
    MockClient::global([
        GetAllCoinsBalance::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getAllCoinsBalance(AccountType::FUND);

    expect($result)
        ->toBeInstanceOf(AllCoinsBalance::class)
        ->and($result->balance)
        ->toHaveCount(2)
        ->and($result->balance->first()->transferBalance)
        ->toBeFloat();
});
