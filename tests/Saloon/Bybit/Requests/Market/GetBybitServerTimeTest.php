<?php

use BybitApi\Facades\Market;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetBybitServerTime;
use BybitApi\Tests\Fixtures\Bybit\Market\GetBybitServerTime\OkFixture;
use Illuminate\Support\Carbon;
use Saloon\Http\Faking\MockClient;

it('return a carbon object on success', function () {
    MockClient::global([
        GetBybitServerTime::class => OkFixture::call(),
    ]);

    $result = Market::actingAs($this->defaultActor())->getBybitServerTime();

    expect($result)
        ->toBeInstanceOf(Carbon::class)
        ->and($result->isToday())
        ->toBeTrue();
});
