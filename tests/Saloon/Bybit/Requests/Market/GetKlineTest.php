<?php

use BybitApi\DTOs\Market\Kline;
use BybitApi\Enums\Interval;
use BybitApi\Facades\Market;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetKline;
use BybitApi\Tests\Fixtures\Bybit\Market\GetKline\TwentyMinuteCandlesFixture;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;

it('return a carbon object on success', function () {
    MockClient::global([
        GetKline::class => TwentyMinuteCandlesFixture::call(),
    ]);

    $result = Market::actingAs($this->defaultActor())
        ->getKline('BTCUSDT', Interval::M1, limit: 20);

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(20)
        ->each
        ->toBeInstanceOf(Kline::class)
        ->and($result->first()->startTime)
        ->toBeInstanceOf(Carbon::class);
});
