<?php

use BybitApi\DTOs\Trade\PlacedOrder;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderSide;
use BybitApi\Enums\OrderType;
use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Entities\Order;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\PlaceOrder;
use BybitApi\Tests\Fixtures\Bybit\Trade\PlaceOrder\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can place a single order', function () {
    MockClient::global([
        PlaceOrder::class => OkFixture::call(),
    ]);

    $result = Trade::actingAs($this->defaultActor())->placeOrder(
        Category::SPOT,
        new Order(
            'BTCUSDT',
            OrderSide::BUY,
            OrderType::MARKET,
            '20'
        )
    );
    expect($result)
        ->toBeInstanceOf(PlacedOrder::class)
        ->and($result->orderId)
        ->toBeString()
        ->and($result->orderLinkId)
        ->toBeString();
});
