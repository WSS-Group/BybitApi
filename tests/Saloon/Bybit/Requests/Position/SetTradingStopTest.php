<?php

use BybitApi\Enums\Category;
use BybitApi\Enums\PositionIndex;
use BybitApi\Enums\TakeProfitStopLossMode;
use BybitApi\Facades\Position;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SetTradingStop;
use BybitApi\Tests\Fixtures\Bybit\Position\SetTradingStop\NotModifiedFixture;
use BybitApi\Tests\Fixtures\Bybit\Position\SetTradingStop\OkFixture;
use Saloon\Http\Faking\MockClient;

it('return true when it was setted the wanted trading stop', function () {
    MockClient::global([
        SetTradingStop::class => OkFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())
        ->setTradingStop(
            Category::LINEAR,
            'BTCUSDT',
            TakeProfitStopLossMode::FULL,
            PositionIndex::EDGE_BUY,
            '100000',
        );

    expect($result)
        ->toBeTrue();
});

it('return true when it already is the wanted mode', function () {
    MockClient::global([
        SetTradingStop::class => NotModifiedFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())
        ->setTradingStop(
            Category::LINEAR,
            'BTCUSDT',
            TakeProfitStopLossMode::FULL,
            PositionIndex::EDGE_BUY,
            '100000',
        );

    expect($result)
        ->toBeTrue();
});

it('throw exception on missing parameters', function () {
    MockClient::global([
        SetTradingStop::class => OkFixture::call(),
    ]);

    expect(fn () => Position::actingAs($this->defaultActor())
        ->setTradingStop(
            Category::LINEAR,
            'BTCUSDT',
            TakeProfitStopLossMode::FULL,
            PositionIndex::EDGE_BUY,
        ))
        ->toThrow("On request 'BybitApi\Http\Integrations\Bybit\Requests\Position\SetTradingStop' 'takeProfit', 'stopLoss' or 'trailingStop' must be filled.");
});
