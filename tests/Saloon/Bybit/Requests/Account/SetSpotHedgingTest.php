<?php

use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\SetSpotHedging;
use BybitApi\Tests\Fixtures\Bybit\Account\SetSpotHedging\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can set spot hedging', function () {
    MockClient::global([
        SetSpotHedging::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->setSpotHedging(true);

    expect($result)
        ->toBeBool();
});
