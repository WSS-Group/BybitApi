<?php

use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\Enums\Category;
use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\CancelIntent;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\CancelOrder;
use BybitApi\Tests\Fixtures\Bybit\Trade\CancelOrder\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can cancel a single order', function () {
    MockClient::global([
        CancelOrder::class => OkFixture::call(),
    ]);
    $orderId = strval(fake()->numberBetween(1000000000000000000, 9999999999999999999));
    $result = Trade::actingAs($this->defaultActor())->cancelOrder(
        Category::SPOT,
        new CancelIntent('BTCUSDT', $orderId)
    );
    expect($result)
        ->toBeInstanceOf(CanceledOrder::class)
        ->and($result->orderId)
        ->toBeString()
        ->toEqual($orderId)
        ->and($result->orderLinkId)
        ->toBeNull();
});
