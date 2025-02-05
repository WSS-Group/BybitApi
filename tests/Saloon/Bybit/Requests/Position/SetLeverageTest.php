<?php

use BybitApi\Enums\Category;
use BybitApi\Facades\Position;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SetLeverage;
use BybitApi\Tests\Fixtures\Bybit\Position\SetLeverage\NotModifiedFixture;
use BybitApi\Tests\Fixtures\Bybit\Position\SetLeverage\OkFixture;
use Saloon\Http\Faking\MockClient;

it('return true when it was modified to wanted mode', function () {
    MockClient::global([
        SetLeverage::class => OkFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())
        ->setLeverage(Category::LINEAR, 'BTCUSDT', 10, 10);

    expect($result)
        ->toBeTrue();
});

it('return true when it already is the wanted mode', function () {
    MockClient::global([
        SetLeverage::class => NotModifiedFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())
        ->setLeverage(Category::LINEAR, 'BTCUSDT', 10, 10);

    expect($result)
        ->toBeTrue();
});
