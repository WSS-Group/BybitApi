<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Trade\Order;
use BybitApi\Enums\Category;
use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\GetRealTimeOrders;
use BybitApi\Tests\Fixtures\Bybit\Trade\GetRealTimeOrders\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can get all orders', function () {
    MockClient::global([
        GetRealTimeOrders::class => OkFixture::call(),
    ]);
    $result = Trade::actingAs($this->defaultActor())->getRealTimeOrders(Category::SPOT);
    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->and($result->first())
        ->toBeInstanceOf(Order::class)
        ->and($result->first()->orderId)
        ->toEqual('1878700750050427648')
        ->and($result->last())
        ->toBeInstanceOf(Order::class)
        ->and($result->last()->orderId)
        ->toEqual('1878700750050427649');
});

it('can a single order', function () {
    MockClient::global([
        GetRealTimeOrders::class => OkFixture::call(),
    ]);
    $result = Trade::actingAs($this->defaultActor())->getRealTimeOrders(Category::SPOT, orderId: '1878700750050427648');
    expect($result)
        ->toBeInstanceOf(Order::class)
        ->and($result->orderId)
        ->toEqual('1878700750050427648');
});
