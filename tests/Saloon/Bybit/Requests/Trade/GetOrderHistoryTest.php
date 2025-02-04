<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Trade\Order;
use BybitApi\Enums\Category;
use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\GetOrderHistory;
use BybitApi\Tests\Fixtures\Bybit\Trade\GetOrderHistory\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can get all orders', function () {
    MockClient::global([
        GetOrderHistory::class => OkFixture::call(),
    ]);
    $result = Trade::actingAs($this->defaultActor())->getOrderHistory(Category::SPOT);
    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->and($result->first())
        ->toBeInstanceOf(Order::class)
        ->and($result->first()->orderId)
        ->toEqual('1878573146723058432')
        ->and($result->last())
        ->toBeInstanceOf(Order::class)
        ->and($result->last()->orderId)
        ->toEqual('1878573146723058433');
});

it('can a single order', function () {
    MockClient::global([
        GetOrderHistory::class => OkFixture::call(),
    ]);
    $result = Trade::actingAs($this->defaultActor())->getOrderHistory(Category::SPOT, orderId: '1878700750050427648');
    expect($result)
        ->toBeInstanceOf(Order::class)
        ->and($result->orderId)
        ->toEqual('1878573146723058432');
});
