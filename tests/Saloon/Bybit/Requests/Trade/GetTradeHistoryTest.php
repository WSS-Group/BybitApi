<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Trade\TradeHistoryOrder;
use BybitApi\Enums\Category;
use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\GetTradeHistory;
use BybitApi\Tests\Fixtures\Bybit\Trade\GetTradeHistory\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can get all trades', function () {
    MockClient::global([
        GetTradeHistory::class => OkFixture::call(),
    ]);
    $result = Trade::actingAs($this->defaultActor())->getTradeHistory(Category::SPOT);
    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->and($result->first())
        ->toBeInstanceOf(TradeHistoryOrder::class)
        ->and($result->first()->orderId)
        ->toEqual('1875099720804991745')
        ->and($result->last())
        ->toBeInstanceOf(TradeHistoryOrder::class)
        ->and($result->last()->orderId)
        ->toEqual('1875099720804991745');
});
