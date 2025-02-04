<?php

use BybitApi\DTOs\Trade\BatchCanceledOrder;
use BybitApi\Enums\Category;
use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\CancelIntent;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\BatchCancelOrder;
use BybitApi\Tests\Fixtures\Bybit\Trade\BatchCancelOrders\OkFixture;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;

it('can cancel all orders', function () {
    $orders = [
        new CancelIntent('BTCUSDT', '1875834046228202240', '1875834046228202241'),
        new CancelIntent('BTCUSDT', '1875834035172016896', '1875834035172016897'),
    ];
    MockClient::global([
        BatchCancelOrder::class => OkFixture::call(collect($orders)),
    ]);
    $result = Trade::actingAs($this->defaultActor())->batchCancelOrder(
        Category::SPOT,
        ...$orders
    );
    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->and($result->first())
        ->toBeInstanceOf(BatchCanceledOrder::class)
        ->and($result->first()->orderId)
        ->toEqual('1875834046228202240')
        ->and($result->last())
        ->toBeInstanceOf(BatchCanceledOrder::class)
        ->and($result->last()->orderId)
        ->toEqual('1875834035172016896');
});
