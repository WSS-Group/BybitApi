<?php

use BybitApi\DTOs\Trade\AmendedOrder;
use BybitApi\Enums\Category;
use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\AmendIntent;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\AmendOrder;
use BybitApi\Tests\Fixtures\Bybit\Trade\AmendOrder\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can amend a single order', function () {
    MockClient::global([
        AmendOrder::class => OkFixture::call(),
    ]);
    $orderId = strval(fake()->numberBetween(1000000000000000000, 9999999999999999999));
    $result = Trade::actingAs($this->defaultActor())->amendOrder(
        Category::SPOT,
        new AmendIntent('BTCUSDT', $orderId)
    );
    expect($result)
        ->toBeInstanceOf(AmendedOrder::class)
        ->and($result->orderId)
        ->toBeString()
        ->toEqual($orderId)
        ->and($result->orderLinkId)
        ->toBeNull();
});
