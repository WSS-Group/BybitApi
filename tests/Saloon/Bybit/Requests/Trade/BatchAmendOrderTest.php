<?php

use BybitApi\DTOs\Trade\BatchAmendedOrder;
use BybitApi\Enums\Category;
use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\AmendIntent;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\BatchAmendOrder;
use BybitApi\Tests\Fixtures\Bybit\Trade\BatchAmendOrder\OkFixture;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;

it('can amend two orders', function () {
    MockClient::global([
        BatchAmendOrder::class => OkFixture::call(),
    ]);

    $result = Trade::actingAs($this->defaultActor())->batchAmendOrder(
        Category::SPOT,
        new AmendIntent('BTCUSDT', '0001', price: '91000'),
        new AmendIntent('BTCUSDT', '0002', price: '91000'),
    );
    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->and($result->first())
        ->toBeInstanceOf(BatchAmendedOrder::class)
        ->and($result->first()->orderId)
        ->toEqual('0001')
        ->and($result->last())
        ->toBeInstanceOf(BatchAmendedOrder::class)
        ->and($result->last()->orderId)
        ->toEqual('0002');
});
