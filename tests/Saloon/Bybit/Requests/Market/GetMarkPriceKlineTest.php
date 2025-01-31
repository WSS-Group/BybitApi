<?php

use BybitApi\DTOs\Market\MarkIndexPriceKline;
use BybitApi\Enums\Interval;
use BybitApi\Facades\Market;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetMarkPriceKline;
use BybitApi\Tests\Fixtures\Bybit\Market\GetMarkPriceKline\TwentyMinuteCandlesFixture;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;

it('return a carbon object on success', function () {
    MockClient::global([
        GetMarkPriceKline::class => TwentyMinuteCandlesFixture::call(),
    ]);

    $result = Market::actingAs($this->defaultActor())
        ->getMarkPriceKline('BTCUSDT', Interval::M1, limit: 20);

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(20)
        ->each
        ->toBeInstanceOf(MarkIndexPriceKline::class)
        ->and($result->first()->startTime)
        ->toBeInstanceOf(Carbon::class);
});
