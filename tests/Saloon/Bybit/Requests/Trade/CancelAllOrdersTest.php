<?php

use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\Enums\Category;
use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\CancelAllOrders;
use BybitApi\Tests\Fixtures\Bybit\Trade\CancelAllOrders\OkFixture;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;

it('can cancel all orders', function () {
    MockClient::global([
        CancelAllOrders::class => OkFixture::call(collect([
            CanceledOrder::init(["orderId" => "1875834046228202240", "orderLinkId" => "1875834046228202241"]),
            CanceledOrder::init(["orderId" => "1875834035172016896", "orderLinkId" => "1875834035172016897"]),
        ])),
    ]);
    $orderId = strval(fake()->numberBetween(1000000000000000000, 9999999999999999999));
    $result = Trade::actingAs($this->defaultActor())->cancelAllOrders(
        Category::SPOT,
        'BTCUSDT',
    );
    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->and($result->first())
        ->toBeInstanceOf(CanceledOrder::class)
        ->and($result->first()->orderId)
        ->toEqual('1875834046228202240')
        ->and($result->last())
        ->toBeInstanceOf(CanceledOrder::class)
        ->and($result->last()->orderId)
        ->toEqual('1875834035172016896');
});
