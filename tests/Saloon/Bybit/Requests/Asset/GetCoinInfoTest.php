<?php

use BybitApi\DTOs\Asset\CoinInfo;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetCoinInfo;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetCoinInfo\OkFixture;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('return a list of coins info', function () {
    MockClient::global([
        GetCoinInfo::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getCoinInfo();

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(4)
        ->each(function (Expectation $e) {
            $e->toBeInstanceOf(CoinInfo::class);
            expect($e->value->chains)
                ->toBeInstanceOf(Collection::class)
                ->each->toBeInstanceOf(CoinInfo\Chain::class)
                ->and($e->value->chains->first()->chain)
                ->toBeString();
        });
});
