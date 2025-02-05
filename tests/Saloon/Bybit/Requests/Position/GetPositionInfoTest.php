<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Position\Info;
use BybitApi\Enums\Category;
use BybitApi\Facades\Position;
use BybitApi\Http\Integrations\Bybit\Requests\Position\GetPositionInfo;
use BybitApi\Tests\Fixtures\Bybit\Position\GetPositionInfo\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can return position info', function () {
    MockClient::global([
        GetPositionInfo::class => OkFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())->getPositionInfo(Category::LINEAR, 'BTCUSDT');

    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->toHaveCount(2)
        ->and($result->first())
        ->toBeInstanceOf(Info::class)
        ->and($result->first()->symbol)
        ->toBe('BTCUSDT');
});

it('throw exception on missing parameters', function () {
    MockClient::global([
        GetPositionInfo::class => OkFixture::call(),
    ]);

    expect(fn() => Position::actingAs($this->defaultActor())->getPositionInfo(Category::LINEAR))
        ->toThrow("On request 'BybitApi\Http\Integrations\Bybit\Requests\Position\GetPositionInfo' 'symbol', 'baseCoin' or 'settleCoin' must be filled.");
});
