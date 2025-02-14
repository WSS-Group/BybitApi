<?php

use BybitApi\DTOs\Market\Orderbook;
use BybitApi\Enums\Category;
use BybitApi\Facades\Market;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetOrderbook;
use BybitApi\Tests\Fixtures\Bybit\Market\GetOrderbook\OkFixture;
use Carbon\Carbon;
use Saloon\Http\Faking\MockClient;

it('return a carbon object on success', function () {
    MockClient::global([
        GetOrderbook::class => OkFixture::call(),
    ]);

    $result = Market::actingAs($this->defaultActor())
        ->getOrderBook(Category::LINEAR, 'BTCUSDT');

    expect($result)
        ->toBeInstanceOf(Orderbook::class)
        ->and($result->symbol)
        ->toBeString()
        ->and($result->bid)
        ->toBeCollection()
        ->toHaveCount(5)
        ->each(function (\Pest\Expectation $e) {
            /** @var \BybitApi\DTOs\Market\Orderbook\Bid $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(Orderbook\Bid::class)
                ->and($value->price)
                ->toBeFloat()
                ->and($value->size)
                ->toBeFloat();
        })
        ->and($result->ask)
        ->toBeCollection()
        ->toHaveCount(5)
        ->each(function (\Pest\Expectation $e) {
            /** @var \BybitApi\DTOs\Market\Orderbook\Ask $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(Orderbook\Ask::class)
                ->and($value->price)
                ->toBeFloat()
                ->and($value->size)
                ->toBeFloat();
        })
        ->and($result->timestamp)
        ->toBeInstanceOf(Carbon::class)
        ->and($result->update_id)
        ->toBeInt()
        ->and($result->cross_sequence)
        ->toBeInt()
        ->and($result->cts)
        ->toBeInstanceOf(Carbon::class);
});
