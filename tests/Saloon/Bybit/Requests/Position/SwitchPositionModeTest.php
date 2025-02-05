<?php

use BybitApi\Enums\Category;
use BybitApi\Enums\PositionMode;
use BybitApi\Facades\Position;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SwitchPositionMode;
use BybitApi\Tests\Fixtures\Bybit\Position\SwitchPositionMode\NotModifiedFixture;
use BybitApi\Tests\Fixtures\Bybit\Position\SwitchPositionMode\OkFixture;
use Saloon\Http\Faking\MockClient;

it('return true when it was modified to wanted mode', function () {
    MockClient::global([
        SwitchPositionMode::class => OkFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())
        ->switchPositionMode(Category::LINEAR, PositionMode::BOTH_SIDES, 'BTCUSDT');

    expect($result)
        ->toBeTrue();
});

it('return true when it already is the wanted mode', function () {
    MockClient::global([
        SwitchPositionMode::class => NotModifiedFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())
        ->switchPositionMode(Category::LINEAR, PositionMode::BOTH_SIDES, 'BTCUSDT');

    expect($result)
        ->toBeTrue();
});

it('throw exception on missing parameters', function () {
    MockClient::global([
        SwitchPositionMode::class => OkFixture::call(),
    ]);

    expect(fn() => Position::actingAs($this->defaultActor())
        ->switchPositionMode(Category::LINEAR, PositionMode::BOTH_SIDES))
        ->toThrow("On request 'BybitApi\Http\Integrations\Bybit\Requests\Position\SwitchPositionMode' 'symbol' or 'coin' must be filled.");
});
