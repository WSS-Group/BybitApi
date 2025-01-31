<?php

use BybitApi\Enums\Category;
use BybitApi\Enums\OrderSide;
use BybitApi\Enums\OrderType;
use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Entities\Order;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\BatchPlaceOrder;
use BybitApi\Tests\Fixtures\Bybit\Trade\BatchPlaceOrder\OneSuccessAndOneErrorFixture;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can place two orders, one success and one invalid', function () {
    MockClient::global([
        BatchPlaceOrder::class => OneSuccessAndOneErrorFixture::call(),
    ]);

    $result = Trade::actingAs($this->defaultActor())->batchPlaceOrder(
        Category::SPOT,
        new Order('BTCUSDT', OrderSide::BUY, OrderType::MARKET, '0.001'),
        new Order('BTCUSDT', OrderSide::BUY, OrderType::MARKET, '20'),
    );
    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Trade\BatchPlacedOrder $item */
            $item = $e->value;
            expect($item->code)
                ->toBeInt()
                ->and($item->msg)
                ->toBeString()
                ->and($item->category)
                ->toBeInstanceOf(Category::class)
                ->and($item->symbol)
                ->toBeString()
                ->and($item->orderId === null || is_string($item->orderId))
                ->toBeTrue()
                ->and($item->orderLinkId === null || is_string($item->orderLinkId))
                ->toBeTrue()
                ->and($item->createAt === null || $item->createAt instanceof Carbon)
                ->toBeTrue();
        });
});
